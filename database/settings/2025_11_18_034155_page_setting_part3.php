<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact_page.map_images', []);
        $this->migrator->add('contact_page.address', '<h2 class="text-blue-mensana text-3xl">PT Mensana Aneka Satwa</h2> <p class="text-blue-mensana text-xl"> Mensana Tower Cibubur Lt.18, JI. Raya Kranggan No.69, RT.002/RW.016, Kel. Jatisampurna, Kec. Jatisampurna Bekasi, Jawa Barat, Indonesia, 17433</p>');
        $this->migrator->add('contact_page.contacts', []);
        $this->migrator->add('contact_page.socials', []);
        
        $this->migrator->add('general.address', 'PT. Mensana Aneka Satwa Mensana Tower Cibubur Lt. 18, Jalan Raya Kranggan No. 69, Kelurahan Jatisampurna, Bekasi, Jawa Barat, Indonesia, 17433');
        $this->migrator->add('general.contacts', []);
        $this->migrator->add('general.socials', []);
        $this->migrator->add('general.quick_call_number', '');
        $this->migrator->add('general.quick_call_opening_text', '');
        $this->migrator->add('general.catalogue_id', '');
        $this->migrator->add('general.catalogue_en', '');
        $this->migrator->add('general.header_logo', '');
        $this->migrator->add('general.footer_logo', '');
    }
};
