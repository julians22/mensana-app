<?php

namespace App\Models;

use App\Models\Category\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Article extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, HasSlug;

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

    public $translatable = ['title', 'excerpt', 'body', 'meta_title', 'meta_description', 'meta_keywords'];

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
            ->usingLanguage('id')
            ->saveSlugsTo('slug');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsToMany(SubCategory::class, 'subcategory_articles', 'article_id', 'sub_category_id');
    }

    /**
     * Scope a query to only include Featured Only
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function registerMediaCollections(): void
    {
        $fallBackThumbnailUrl = asset('dummy/article-1.png');

        $this->addMediaCollection('thumbnail')
            ->useFallbackUrl($fallBackThumbnailUrl)
            ->singleFile();
    }
}
