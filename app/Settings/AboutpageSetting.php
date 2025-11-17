<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class AboutpageSetting extends Settings
{
    use PageMeta;

    public ?string $hero_image;
    public ?string $hero_image_mobile;

    public ?string $hero_title_id;
    public ?string $hero_title_en;

    public ?string $hero_subtitle_id;
    public ?string $hero_subtitle_en;

    public $achievements;

    public $section_contents;

    public static function group(): string
    {
        return 'about_page';
    }
}
