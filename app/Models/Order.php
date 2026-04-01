<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'user_id', 'status', 'subtotal', 'tax', 'shipping', 'total',
        'stripe_payment_id', 'stripe_payment_status',
        'shipping_name', 'shipping_email', 'shipping_phone',
        'shipping_address', 'shipping_city', 'shipping_county', 'shipping_zip',
        'wants_invoice', 'company_name', 'company_vat', 'company_address', 'notes',
    ];

    protected $casts = ['wants_invoice' => 'boolean'];

    public function user() { return $this->belongsTo(User::class); }
    public function items() { return $this->hasMany(OrderItem::class); }

    public static function generateNumber(): string {
        return 'PR-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
    }

    public function getStatusLabelAttribute(): string {
        return match($this->status) {
            'new' => 'Nou',
            'processing' => 'În procesare',
            'shipped' => 'Expediat',
            'delivered' => 'Livrat',
            'cancelled' => 'Anulat',
            default => $this->status,
        };
    }
}
