<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'slug', 'icon', 'description', 'parent_id', 'sort_order', 'is_active', 'type', 'group'];
    protected $casts = ['is_active' => 'boolean'];

    public function getSlugOptions(): SlugOptions {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function products() { return $this->hasMany(Product::class); }
    public function parent() { return $this->belongsTo(Category::class, 'parent_id'); }
    public function children() { return $this->hasMany(Category::class, 'parent_id'); }

    public function scopeTopLevel($query) {
        return $query->whereNull('parent_id');
    }

    public function scopeOfGroup($query, $group) {
        return $query->where('group', $group);
    }
}
