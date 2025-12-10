<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class HomepageSetting extends Settings
{
    use PageMeta;

    public $marketing_section_titles_id;
    public $marketing_section_titles_en;

    public $marketing_section_left_contents_id;
    public $marketing_section_left_contents_en;

    public $marketing_section_right_contents_id;
    public $marketing_section_right_contents_en;

    public static function group(): string
    {
        return 'home_page';
    }
}
