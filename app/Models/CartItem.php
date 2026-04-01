<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['session_id', 'user_id', 'product_id', 'quantity', 'added_at'];
    protected $casts = ['added_at' => 'datetime'];

    public function product() { return $this->belongsTo(Product::class); }
}
