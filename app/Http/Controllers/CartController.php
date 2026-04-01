<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index()
    {
        $items = $this->cart->getItems();
        $totals = $this->cart->getTotals();
        return view('cart.index', compact('items', 'totals'));
    }

    public function add(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id', 'quantity' => 'integer|min:1|max:99']);
        $product = Product::findOrFail($request->product_id);
        $this->cart->add($product, $request->input('quantity', 1));

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'count' => $this->cart->count(), 'message' => 'Produs adăugat în coș!']);
        }
        return back()->with('success', 'Produs adăugat în coș!');
    }

    public function update(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id', 'quantity' => 'required|integer|min:0|max:99']);
        $this->cart->update($request->product_id, $request->quantity);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'totals' => $this->cart->getTotals(), 'count' => $this->cart->count()]);
        }
        return back();
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);
        $this->cart->remove($request->product_id);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'count' => $this->cart->count()]);
        }
        return back();
    }

    public function count()
    {
        return response()->json(['count' => $this->cart->count()]);
    }
}
