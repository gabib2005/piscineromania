<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->withCount('products')
            ->orderBy('sort_order')
            ->get();

        $featuredProducts = Product::active()->featured()
            ->with(['category', 'primaryImage'])
            ->limit(8)
            ->get();

        return view('home', compact('categories', 'featuredProducts'));
    }
}
