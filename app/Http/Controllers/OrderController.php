<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\StripeClient;

class OrderController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function checkout()
    {
        if ($this->cart->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Coșul tău este gol.');
        }
        $items = $this->cart->getItems();
        $totals = $this->cart->getTotals();
        $user = auth()->user();
        return view('cart.checkout', compact('items', 'totals', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name'    => 'required|string|max:100',
            'shipping_email'   => 'required|email',
            'shipping_phone'   => 'nullable|string|max:20',
            'shipping_address' => 'required|string|max:255',
            'shipping_city'    => 'required|string|max:100',
            'shipping_county'  => 'required|string|max:100',
            'shipping_zip'     => 'nullable|string|max:20',
            'gdpr_consent'     => 'required|accepted',
        ], [
            'gdpr_consent.required' => 'Trebuie să accepți Politica de Confidențialitate pentru a plasa comanda.',
            'gdpr_consent.accepted' => 'Trebuie să accepți Politica de Confidențialitate pentru a plasa comanda.',
        ]);

        $items = $this->cart->getItems();
        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Coșul tău este gol.');
        }

        $totals = $this->cart->getTotals();

        $order = Order::create([
            'order_number'     => Order::generateNumber(),
            'user_id'          => auth()->id(),
            'status'           => 'new',
            'subtotal'         => $totals['subtotal'],
            'tax'              => $totals['tax'],
            'shipping'         => $totals['shipping'],
            'total'            => $totals['total'],
            'shipping_name'    => $request->shipping_name,
            'shipping_email'   => $request->shipping_email,
            'shipping_phone'   => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
            'shipping_city'    => $request->shipping_city,
            'shipping_county'  => $request->shipping_county,
            'shipping_zip'     => $request->shipping_zip,
            'wants_invoice'    => $request->boolean('wants_invoice'),
            'company_name'     => $request->company_name,
            'company_vat'      => $request->company_vat,
            'company_address'  => $request->company_address,
            'notes'            => $request->notes,
        ]);

        foreach ($items as $item) {
            $order->items()->create([
                'product_id'   => $item->product_id,
                'product_code' => $item->product->code,
                'product_name' => $item->product->name,
                'quantity'     => $item->quantity,
                'unit_price'   => $item->product->price,
                'subtotal'     => $item->product->price * $item->quantity,
            ]);
        }

        $this->cart->clear();

        return redirect()->route('order.payment', $order->order_number);
    }

    public function payment(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->with('items.product')
            ->firstOrFail();

        $stripeKey = config('cashier.key');
        return view('cart.payment', compact('order', 'stripeKey'));
    }

    public function createPaymentIntent(Request $request, string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $stripe = new StripeClient(config('cashier.secret'));
        $intent = $stripe->paymentIntents->create([
            'amount'   => (int) ($order->total * 100),
            'currency' => 'ron',
            'metadata' => ['order_number' => $order->order_number],
        ]);

        return response()->json(['clientSecret' => $intent->client_secret]);
    }

    public function confirmation(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->with('items.product')
            ->firstOrFail();

        return view('orders.confirmation', compact('order'));
    }
}
