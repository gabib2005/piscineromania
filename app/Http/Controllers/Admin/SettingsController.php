<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'company_name'       => env('COMPANY_NAME', 'PiscineRomania SRL'),
            'company_email'      => env('MAIL_FROM_ADDRESS', 'contact@piscineromania.ro'),
            'shipping_threshold' => env('SHIPPING_FREE_THRESHOLD', 800),
            'shipping_cost'      => env('SHIPPING_COST', 30),
            'price_markup'       => env('PRICE_MARKUP_PERCENT', 10),
        ];
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        return back()->with('success', 'Setările au fost salvate. Actualizați manual fișierul .env pentru persistență.');
    }
}
