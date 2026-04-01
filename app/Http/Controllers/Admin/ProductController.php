<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\ExcelImportService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")->orWhere('code', 'like', "%$s%");
            });
        }
        if ($request->filled('category_id')) $query->where('category_id', $request->category_id);
        if ($request->filled('stock')) $query->where('stock_status', $request->stock);

        $sort = $request->input('sort', 'id_desc');
        match($sort) {
            'name_asc'    => $query->orderBy('name'),
            'name_desc'   => $query->orderBy('name', 'desc'),
            'price_asc'   => $query->orderBy('price'),
            'price_desc'  => $query->orderBy('price', 'desc'),
            default       => $query->orderBy('id', 'desc'),
        };

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'         => 'required|string|unique:products,code',
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'stock_status' => 'required|in:in_stock,on_order',
            'category_id'  => 'nullable|exists:categories,id',
            'is_active'    => 'boolean',
            'is_featured'  => 'boolean',
        ]);
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Produs creat!');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'stock_status' => 'required|in:in_stock,on_order',
            'category_id'  => 'nullable|exists:categories,id',
            'is_active'    => 'boolean',
            'is_featured'  => 'boolean',
        ]);
        $product->update($data);

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('admin.products.index')->with('success', 'Produs actualizat!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produs șters!');
    }

    public function import(Request $request)
    {
        $request->validate(['file' => 'required|file|mimes:xlsx,xls,csv']);
        $service = new ExcelImportService();
        $result = $service->import($request->file('file'));
        return redirect()->route('admin.products.index')->with('success', "Import: {$result['added']} adăugate, {$result['updated']} actualizate, {$result['errors']} erori.");
    }

    public function bulk(Request $request)
    {
        $request->validate(['ids' => 'required|array', 'action' => 'required|in:delete,activate,deactivate,in_stock,on_order']);
        $products = Product::whereIn('id', $request->ids);

        match($request->action) {
            'delete'     => $products->delete(),
            'activate'   => $products->update(['is_active' => true]),
            'deactivate' => $products->update(['is_active' => false]),
            'in_stock'   => $products->update(['stock_status' => 'in_stock']),
            'on_order'   => $products->update(['stock_status' => 'on_order']),
        };

        return response()->json(['success' => true]);
    }

    public function export()
    {
        $products = Product::with('category')->get();
        $filename = 'produse-' . date('Y-m-d') . '.csv';

        $headers = ['Content-Type' => 'text/csv; charset=UTF-8', 'Content-Disposition' => "attachment; filename=\"$filename\""];
        $callback = function () use ($products) {
            $f = fopen('php://output', 'w');
            fputs($f, "\xEF\xBB\xBF"); // BOM for Excel
            fputcsv($f, ['ID', 'Cod', 'Denumire', 'Categorie', 'Pret', 'Stoc', 'Activ'], ';');
            foreach ($products as $p) {
                fputcsv($f, [$p->id, $p->code, $p->name, $p->category?->name, $p->price, $p->stock_status, $p->is_active ? 'Da' : 'Nu'], ';');
            }
            fclose($f);
        };

        return response()->stream($callback, 200, $headers);
    }
}
