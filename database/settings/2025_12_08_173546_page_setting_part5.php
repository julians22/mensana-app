<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {

        // Contacts
        $this->migrator->add('contact_page.section_content_id', []);
        $this->migrator->add('contact_page.section_content_en', []);

        // Home
        $this->migrator->add('home_page.marketing_section_titles_id', []);
        $this->migrator->add('home_page.marketing_section_titles_en', []);
        $this->migrator->add('home_page.marketing_section_left_contents_id', []);
        $this->migrator->add('home_page.marketing_section_left_contents_en', []);
        $this->migrator->add('home_page.marketing_section_right_contents_id', []);
        $this->migrator->add('home_page.marketing_section_right_contents_en', []);
    }

    public function down(): void
    {
        // Contacts
        $this->migrator->delete('contact_page.section_content_id');
        $this->migrator->delete('contact_page.section_content_en');

        // Home
        $this->migrator->delete('home_page.marketing_section_titles_id', []);
        $this->migrator->delete('home_page.marketing_section_titles_en', []);
        $this->migrator->delete('home_page.marketing_section_left_contents_id', []);
        $this->migrator->delete('home_page.marketing_section_left_contents_en', []);
        $this->migrator->delete('home_page.marketing_section_right_contents_id', []);
        $this->migrator->delete('home_page.marketing_section_right_contents_en', []);
    }
};
