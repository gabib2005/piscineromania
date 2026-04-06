<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Billable;

    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'facebook_id', 'phone', 'avatar',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders() { return $this->hasMany(Order::class); }
    public function customer() { return $this->hasOne(Customer::class); }
    public function cartItems() { return $this->hasMany(CartItem::class); }

    public function gdprExport(): array
    {
        return [
            'exportat_la' => now()->toIso8601String(),
            'operator'    => 'PiscineRomania SRL',
            'profil'      => [
                'nume'               => $this->name,
                'email'              => $this->email,
                'telefon'            => $this->phone,
                'cont_creat_la'      => $this->created_at?->toIso8601String(),
                'ultima_actualizare' => $this->updated_at?->toIso8601String(),
                'autentificare'      => $this->google_id ? 'Google OAuth' : ($this->facebook_id ? 'Facebook OAuth' : 'Email/Parolă'),
            ],
            'comenzi' => $this->orders()->select(
                'order_number','status','total',
                'shipping_name','shipping_email','shipping_phone',
                'shipping_address','shipping_city','shipping_county','created_at'
            )->get()->toArray(),
            'date_client' => $this->customer ? [
                'total_comenzi'  => $this->customer->total_orders,
                'total_cheltuit' => $this->customer->total_spent,
            ] : null,
        ];
    }
}
