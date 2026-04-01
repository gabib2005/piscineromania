<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;

    protected $fillable = [
        'code', 'name', 'slug', 'description', 'price', 'price_eur',
        'stock_status', 'category_id', 'is_active', 'is_featured', 'image_url',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'price_eur' => 'decimal:2',
    ];

    public function getSlugOptions(): SlugOptions {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function category() { return $this->belongsTo(Category::class); }
    public function images() { return $this->hasMany(ProductImage::class)->orderBy('sort_order'); }
    public function primaryImage() { return $this->hasOne(ProductImage::class)->where('is_primary', true); }
    public function orderItems() { return $this->hasMany(OrderItem::class); }

    public function getPriceWithTaxAttribute(): float {
        return round($this->price * 1.19, 2);
    }

    public function getIsInStockAttribute(): bool {
        return $this->stock_status === 'in_stock';
    }

    public function scopeActive($query) { return $query->where('is_active', true); }
    public function scopeFeatured($query) { return $query->where('is_featured', true); }
}
