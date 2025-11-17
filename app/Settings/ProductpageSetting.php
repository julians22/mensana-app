<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class ProductpageSetting extends Settings
{
    use PageMeta;

    public ?string $hero_image;
    public ?string $hero_image_mobile;

    public ?string $hero_title_id;
    public ?string $hero_title_en;

    public ?string $hero_subtitle_id;
    public ?string $hero_subtitle_en;

    public static function group(): string
    {
        return 'product_page';
    }
}
