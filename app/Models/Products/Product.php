<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasTranslations, HasSlug;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'sku', 'price', 'stock', 'is_active'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $translatable = ['description'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('-')
            ->usingLanguage('id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function animals() {
        return $this->belongsToMany(Animal::class);
    }

    public function tags() {
        return $this->belongsToMany(Tags::class, 'product_tag', 'product_id', 'tag_id');
    }

    /**
     * Short Description attribute
     */
    public function getShortDescriptionAttribute()
    {
        return strip_tags(Str::limit($this->description, 100));
    }


}
