<?php
namespace App\Settings\Attributes;

use Spatie\LaravelSettings\Settings;

trait PageMeta
{
    public string $title_id;
    public string $title_en;

    public string $meta_description_id;
    public string $meta_description_en;

    public string $meta_keywords_id;
    public string $meta_keywords_en;

    public ?string $meta_og_img_id = null;
    public ?string $meta_og_img_en = null;
}
