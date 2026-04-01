<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('sort_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100', 'icon' => 'nullable|string|max:10']);
        Category::create(['name' => $request->name, 'icon' => $request->icon]);
        return redirect()->route('admin.categories.index')->with('success', 'Categorie adăugată!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:100', 'icon' => 'nullable|string|max:10', 'sort_order' => 'integer']);
        $category->update($request->only('name', 'icon', 'sort_order', 'is_active'));

        if ($request->expectsJson()) return response()->json(['success' => true]);
        return redirect()->route('admin.categories.index')->with('success', 'Categorie actualizată!');
    }

    public function destroy(Category $category)
    {
        // Move products to "Diverse" category (id=19) or null
        $diverse = Category::where('name', 'Diverse')->first();
        $category->products()->update(['category_id' => $diverse?->id]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categorie ștearsă!');
    }
}
