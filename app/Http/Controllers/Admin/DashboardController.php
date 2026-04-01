<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'orders_today'   => Order::whereDate('created_at', today())->count(),
            'orders_week'    => Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'orders_month'   => Order::whereMonth('created_at', now()->month)->count(),
            'revenue_month'  => Order::whereMonth('created_at', now()->month)->whereNotIn('status', ['cancelled'])->sum('total'),
            'new_orders'     => Order::where('status', 'new')->count(),
            'products_count' => Product::active()->count(),
            'users_count'    => User::count(),
        ];

        $recentOrders = Order::with('user')->latest()->limit(10)->get();

        $salesData = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->whereNotIn('status', ['cancelled'])
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'salesData'));
    }
}
