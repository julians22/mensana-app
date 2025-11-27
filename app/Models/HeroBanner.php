<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class HeroBanner extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'link'];

    public $translatable = ['title', 'subtitle'];


    public function isHasLink() : bool
    {
        return !empty($this->link);
    }

    public function isHasTitle() : bool
    {
        return !empty($this->title);
    }

    public function isHasSubTitle() : bool
    {
        return !empty($this->subtitle);
    }
}
