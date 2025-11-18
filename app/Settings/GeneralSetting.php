<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{

    // Error last time

    public array $contacts;
    public array $socials;

    public ?string $address;
    public ?string $quick_call_number;
    public ?string $quick_call_opening_text;
    public ?string $catalogue_id;
    public ?string $catalogue_en;
    public ?string $header_logo;
    public ?string $footer_logo;

    public static function group(): string
    {
        return 'general';
    }
}
