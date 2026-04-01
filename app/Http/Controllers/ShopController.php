<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active()->with(['category', 'primaryImage']);

        $this->applyFilters($query, $request);

        $products = $query->paginate(24)->withQueryString();
        $categories = Category::where('is_active', true)->withCount('products')->orderBy('sort_order')->get();

        return view('shop.index', compact('products', 'categories'));
    }

    public function category(Request $request, string $categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->where('is_active', true)->firstOrFail();

        $query = Product::active()
            ->where('category_id', $category->id)
            ->with(['category', 'primaryImage']);

        $this->applyFilters($query, $request);

        $products = $query->paginate(24)->withQueryString();
        $categories = Category::where('is_active', true)->withCount('products')->orderBy('sort_order')->get();

        return view('shop.category', compact('products', 'category', 'categories'));
    }

    public function show(string $categorySlug, string $productSlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $product = Product::active()
            ->where('slug', $productSlug)
            ->where('category_id', $category->id)
            ->with(['category', 'images'])
            ->firstOrFail();

        $related = Product::active()
            ->where('category_id', $category->id)
            ->where('id', '!=', $product->id)
            ->with('primaryImage')
            ->limit(4)
            ->get();

        return view('shop.show', compact('product', 'category', 'related'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q', '');
        $products = collect();

        if (strlen($q) >= 2) {
            $products = Product::active()
                ->where(function ($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%")
                          ->orWhere('code', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%");
                })
                ->with(['category', 'primaryImage'])
                ->paginate(24)
                ->withQueryString();
        }

        return view('shop.search', compact('products', 'q'));
    }

    private function applyFilters($query, Request $request)
    {
        if ($request->filled('pret_min')) {
            $query->where('price', '>=', $request->pret_min);
        }
        if ($request->filled('pret_max')) {
            $query->where('price', '<=', $request->pret_max);
        }
        if ($request->filled('stoc')) {
            $query->where('stock_status', $request->stoc);
        }
        $sort = $request->input('sort', 'relevance');
        match($sort) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc'   => $query->orderBy('name', 'asc'),
            default      => $query->orderBy('is_featured', 'desc')->orderBy('id', 'desc'),
        };
    }
}
