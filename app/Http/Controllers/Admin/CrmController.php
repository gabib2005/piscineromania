<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('customer')->withCount('orders')->withSum('orders', 'total');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")->orWhere('email', 'like', "%$s%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();
        return view('admin.crm.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('orders.items', 'customer');
        return view('admin.crm.show', compact('user'));
    }

    public function addNote(Request $request, User $user)
    {
        $request->validate(['note' => 'required|string|max:1000']);
        $customer = $user->customer()->firstOrCreate(['user_id' => $user->id]);
        $customer->update([
            'notes'            => $customer->notes . "\n[" . now()->format('d.m.Y H:i') . "] " . $request->note,
            'last_contact_at'  => now(),
        ]);
        return back()->with('success', 'Notă adăugată!');
    }
}
