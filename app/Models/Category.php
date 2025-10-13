<?php

namespace App\Models;

use App\Models\Category\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, HasTranslatableSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public $translatable = ['name', 'slug', 'description'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
