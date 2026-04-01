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
}
