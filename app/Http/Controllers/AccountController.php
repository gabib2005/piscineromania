<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function orders()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);
        return view('account.orders', compact('orders'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('account.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);
        auth()->user()->update($request->only('name', 'phone'));
        return back()->with('success', 'Profil actualizat!');
    }
}
