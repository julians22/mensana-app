<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class PostpageSetting extends Settings
{
    use PageMeta;

    public static function group(): string
    {
        return 'post_page';
    }
}
