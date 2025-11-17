<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class HomepageSetting extends Settings
{
    use PageMeta;

    public static function group(): string
    {
        return 'home_page';
    }
}
