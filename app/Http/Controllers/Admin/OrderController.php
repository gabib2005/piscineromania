<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user');

        if ($request->filled('status')) $query->where('status', $request->status);
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('order_number', 'like', "%$s%")
                  ->orWhere('shipping_name', 'like', "%$s%")
                  ->orWhere('shipping_email', 'like', "%$s%");
            });
        }

        $orders = $query->latest()->paginate(20)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.product', 'user');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:new,processing,shipped,delivered,cancelled']);
        $order->update(['status' => $request->status]);
        // TODO: send email notification to customer
        return redirect()->route('admin.orders.show', $order)->with('success', 'Status actualizat!');
    }

    public function invoice(Order $order)
    {
        $order->load('items', 'user');
        $pdf = Pdf::loadView('admin.orders.invoice', compact('order'));
        return $pdf->download("factura-{$order->order_number}.pdf");
    }
}
