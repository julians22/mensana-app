<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasTranslations, HasSlug, InteractsWithMedia;

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
    protected $fillable = ['name', 'subtitle', 'excerpt', 'description', 'sku', 'price', 'stock', 'is_active', 'is_featured', 'sizes'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'sizes' => 'array',
        'is_featured' => 'boolean'
    ];

    protected $translatable = ['description', 'subtitle', 'excerpt'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('-')
            ->usingLanguage('id');
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product');
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
        if (!$this->excerpt) {
            return strip_tags(Str::limit($this->description, 100));
        }

        return $this->excerpt;
    }

    public function registerMediaCollections(): void
    {
        $fallBackThumbnailUrl = asset('product-thumbs.png');

        $this->addMediaCollection('thumbnail')
            ->useFallbackUrl($fallBackThumbnailUrl)
            ->singleFile();

        $this->addMediaCollection('showcase');
    }


    /**
     * Scope a query to only include is_featured
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }


}
