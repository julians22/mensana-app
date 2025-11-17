<?php

namespace App\Enums\Filament;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum AdminNavigationGroup: string implements HasLabel, HasIcon
{
    case ProductManagements = 'product-managements';
    case Posts = 'posts';
    case Preferences = 'preferences';
    case Settings = 'settings';

    public function getLabel(): string
    {
        return match ($this) {
            self::ProductManagements => __('navigation-groups.product_managements'),
            self::Posts => __('navigation-groups.posts'),
            self::Preferences => __('navigation-groups.preferences'),
            self::Settings => __('navigation-groups.settings'),
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Preferences => 'heroicon-o-cog-6-tooth',
            self::ProductManagements => 'heroicon-o-cube',
            self::Posts => 'heroicon-o-newspaper',
            self::Settings => 'heroicon-o-adjustments-horizontal',
        };
    }
}


?>
