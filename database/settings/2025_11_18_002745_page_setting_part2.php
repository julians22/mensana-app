<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // About page
        $this->migrator->add('about_page.hero_image_mobile', '');

        // Product Page
        $this->migrator->add('product_page.hero_image', '');
        $this->migrator->add('product_page.hero_image_mobile', '');
        $this->migrator->add('product_page.hero_title_id', '');
        $this->migrator->add('product_page.hero_title_en', '');
        $this->migrator->add('product_page.hero_subtitle_id', '');
        $this->migrator->add('product_page.hero_subtitle_en', '');

        // Service Page
        $this->migrator->add('service_page.hero_image', '');
        $this->migrator->add('service_page.hero_image_mobile', '');
        $this->migrator->add('service_page.hero_title_id', 'Kami berikan yang terbaik untuk kebutuhan ternak Anda.');
        $this->migrator->add('service_page.hero_title_en', 'We provide the best for your livestock needs.');
        $this->migrator->add('service_page.hero_subtitle_id', '');
        $this->migrator->add('service_page.hero_subtitle_en', '');
    }
};
