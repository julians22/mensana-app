<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class ContactpageSetting extends Settings
{
    use PageMeta;

    public string $address;

    public $map_images;
    public $contacts;
    public $socials;

    public $section_content_id;
    public $section_content_en;

    public static function group(): string
    {
        return 'contact_page';
    }
}
