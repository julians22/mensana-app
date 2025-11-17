<?php

namespace App\Settings;

use App\Settings\Attributes\PageMeta;
use Spatie\LaravelSettings\Settings;

class ContactpageSetting extends Settings
{

    use PageMeta;

    public static function group(): string
    {
        return 'contact_page';
    }
}
