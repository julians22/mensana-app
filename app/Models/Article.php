<?php

namespace App\Models;

use App\Models\Category\SubCategoryItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Article extends Model implements HasMedia, LocalizedUrlRoutable
{
    use HasFactory, HasTranslations, HasTranslatableSlug, InteractsWithMedia;

    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'category_id',
        'published_at',
    ];

    public $translatable = ['title', 'slug', 'body', 'meta_title', 'meta_description', 'meta_keywords'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_category_items()
    {
        return $this->belongsToMany(SubCategoryItem::class, 'sub_category_item_article', 'article_id', 'sub_category_item_id');
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->getTranslation('slug', $locale);
    }
}
