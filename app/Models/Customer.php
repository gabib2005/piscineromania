<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id', 'company', 'vat_code', 'total_orders', 'total_spent', 'notes', 'last_contact_at'];
    protected $casts = ['last_contact_at' => 'datetime', 'total_spent' => 'decimal:2'];

    public function user() { return $this->belongsTo(User::class); }
}
