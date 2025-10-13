<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Tags extends Model
{
    use HasTranslations, HasSlug;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    public $translatable = ['name'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->usingLanguage('id');
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
