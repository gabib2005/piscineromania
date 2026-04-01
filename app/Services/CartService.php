<?php
namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartService
{
    private function getSessionId(): string
    {
        return Session::getId();
    }

    private function getBaseQuery()
    {
        if (auth()->check()) {
            return CartItem::where('user_id', auth()->id());
        }
        return CartItem::where('session_id', $this->getSessionId());
    }

    public function add(Product $product, int $quantity = 1): void
    {
        $query = $this->getBaseQuery()->where('product_id', $product->id);
        $existing = $query->first();

        if ($existing) {
            $existing->increment('quantity', $quantity);
        } else {
            CartItem::create([
                'session_id' => auth()->check() ? null : $this->getSessionId(),
                'user_id'    => auth()->id(),
                'product_id' => $product->id,
                'quantity'   => $quantity,
                'added_at'   => now(),
            ]);
        }
    }

    public function update(int $productId, int $quantity): void
    {
        if ($quantity <= 0) {
            $this->remove($productId);
            return;
        }
        $this->getBaseQuery()->where('product_id', $productId)->update(['quantity' => $quantity]);
    }

    public function remove(int $productId): void
    {
        $this->getBaseQuery()->where('product_id', $productId)->delete();
    }

    public function clear(): void
    {
        $this->getBaseQuery()->delete();
    }

    public function getItems(): Collection
    {
        return $this->getBaseQuery()->with('product.primaryImage')->get();
    }

    public function count(): int
    {
        return $this->getBaseQuery()->sum('quantity');
    }

    public function getTotals(): array
    {
        $items = $this->getItems();
        $subtotal = $items->sum(fn($item) => $item->product->price * $item->quantity);
        $tax = round($subtotal * 0.19, 2);
        $shippingThreshold = (float) env('SHIPPING_FREE_THRESHOLD', 800);
        $shippingCost = (float) env('SHIPPING_COST', 30);
        $shipping = ($subtotal >= $shippingThreshold) ? 0 : $shippingCost;
        $total = round($subtotal + $tax + $shipping, 2);

        return compact('subtotal', 'tax', 'shipping', 'total');
    }

    public function mergeSesionToUser(): void
    {
        if (!auth()->check()) return;
        $sessionItems = CartItem::where('session_id', $this->getSessionId())->get();
        foreach ($sessionItems as $item) {
            $existing = CartItem::where('user_id', auth()->id())
                ->where('product_id', $item->product_id)
                ->first();
            if ($existing) {
                $existing->increment('quantity', $item->quantity);
                $item->delete();
            } else {
                $item->update(['user_id' => auth()->id(), 'session_id' => null]);
            }
        }
    }
}
