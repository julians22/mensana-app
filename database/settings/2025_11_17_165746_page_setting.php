<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {

        // About Page hero_image , hero_title_id , hero_title_en , hero_subtitle_id , hero_subtitle_en

        $this->migrator->add('about_page.hero_image', '');
        $this->migrator->add('about_page.hero_title_id', 'Tentang Kami');
        $this->migrator->add('about_page.hero_title_en', 'About Us');
        $this->migrator->add('about_page.hero_subtitle_id', 'Mewujudkan kesehatan hewan yang optimal');
        $this->migrator->add('about_page.hero_subtitle_en', 'Achieving optimal animal health');
        $this->migrator->add('about_page.achievements', []);
        $this->migrator->add('about_page.section_contents', []);

        $this->migrator->add('about_page.title_id', 'Tentang Kami');
        $this->migrator->add('about_page.title_en', 'About Us');
        $this->migrator->add('about_page.meta_description_id', 'PT Mensana Aneka Satwa adalah perusahaan produsen, importir, eksportir dan distributor yang bergerak dibidang kesehatan hewan.');
        $this->migrator->add('about_page.meta_description_en', 'PT Mensana Aneka Satwa is a producer, importer, exporter and distributor company engaged in animal health.');
        $this->migrator->add('about_page.meta_keywords_id', 'Mensana, Obat Hewan, Kesehatan Hewan, Pakan Ternak, Vitamin Hewan');
        $this->migrator->add('about_page.meta_keywords_en', 'Mensana, Animal Medicine, Animal Health, Animal Feed, Animal Vitamins');
        $this->migrator->add('about_page.meta_og_img_id', '');
        $this->migrator->add('about_page.meta_og_img_en', '');


        // Home Page
        $this->migrator->add('home_page.title_id', 'Mensana Aneka Satwa');
        $this->migrator->add('home_page.title_en', 'Mensana Aneka Satwa');
        $this->migrator->add('home_page.meta_description_id', 'PT Mensana Aneka Satwa adalah perusahaan produsen, importir, eksportir dan distributor yang bergerak dibidang kesehatan hewan.');
        $this->migrator->add('home_page.meta_description_en', 'PT Mensana Aneka Satwa is a producer, importer, exporter and distributor company engaged in animal health.');
        $this->migrator->add('home_page.meta_keywords_id', 'Mensana, Obat Hewan, Kesehatan Hewan, Pakan Ternak, Vitamin Hewan');
        $this->migrator->add('home_page.meta_keywords_en', 'Mensana, Animal Medicine, Animal Health, Animal Feed, Animal Vitamins');
        $this->migrator->add('home_page.meta_og_img_id', '');
        $this->migrator->add('home_page.meta_og_img_en', '');

        // Product Page
        $this->migrator->add('product_page.title_id', 'Produk');
        $this->migrator->add('product_page.title_en', 'Product');
        $this->migrator->add('product_page.meta_description_id', 'Temukan berbagai produk kesehatan hewan berkualitas tinggi dari PT Mensana Aneka Satwa. Kami menyediakan solusi terbaik untuk kebutuhan ternak Anda.');
        $this->migrator->add('product_page.meta_description_en', 'Discover a wide range of high-quality animal health products from PT Mensana Aneka Satwa. We provide the best solutions for your livestock needs.');
        $this->migrator->add('product_page.meta_keywords_id', 'Produk Hewan, Obat Hewan, Vitamin Ternak, Pakan Hewan, Kesehatan Ternak');
        $this->migrator->add('product_page.meta_keywords_en', 'Animal Products, Animal Medicine, Livestock Vitamins, Animal Feed, Livestock Health');
        $this->migrator->add('product_page.meta_og_img_id', '');
        $this->migrator->add('product_page.meta_og_img_en', '');

        // Contact Page
        $this->migrator->add('contact_page.title_id', 'Kontak Kami');
        $this->migrator->add('contact_page.title_en', 'Contact Us');
        $this->migrator->add('contact_page.meta_description_id', 'Hubungi PT Mensana Aneka Satwa untuk informasi lebih lanjut mengenai produk dan layanan kesehatan hewan kami.');
        $this->migrator->add('contact_page.meta_description_en', 'Contact PT Mensana Aneka Satwa for more information about our animal health products and services.');
        $this->migrator->add('contact_page.meta_keywords_id', 'Kontak Mensana, Alamat Mensana, Telepon Mensana, Email Mensana');
        $this->migrator->add('contact_page.meta_keywords_en', 'Contact Mensana, Mensana Address, Mensana Phone, Mensana Email');
        $this->migrator->add('contact_page.meta_og_img_id', '');
        $this->migrator->add('contact_page.meta_og_img_en', '');

        // Service Page
        $this->migrator->add('service_page.title_id', 'Layanan Kami');
        $this->migrator->add('service_page.title_en', 'Our Services');
        $this->migrator->add('service_page.meta_description_id', 'Temukan berbagai layanan kesehatan hewan profesional dari PT Mensana Aneka Satwa, termasuk konsultasi dan laboratorium.');
        $this->migrator->add('service_page.meta_description_en', 'Discover a range of professional animal health services from PT Mensana Aneka Satwa, including consultation and laboratory services.');
        $this->migrator->add('service_page.meta_keywords_id', 'Layanan Mensana, Konsultasi Hewan, Laboratorium Hewan, Kesehatan Hewan');
        $this->migrator->add('service_page.meta_keywords_en', 'Mensana Services, Animal Consultation, Animal Laboratory, Animal Health');
        $this->migrator->add('service_page.meta_og_img_id', '');
        $this->migrator->add('service_page.meta_og_img_en', '');

        // Post Page
        $this->migrator->add('post_page.title_id', 'Berita & Artikel');
        $this->migrator->add('post_page.title_en', 'News & Articles');
        $this->migrator->add('post_page.meta_description_id', 'Baca berita terbaru dan artikel informatif seputar kesehatan hewan, produk, dan inovasi dari PT Mensana Aneka Satwa.');
        $this->migrator->add('post_page.meta_description_en', 'Read the latest news and informative articles about animal health, products, and innovations from PT Mensana Aneka Satwa.');
        $this->migrator->add('post_page.meta_keywords_id', 'Berita Hewan, Artikel Kesehatan Hewan, Informasi Ternak, Inovasi Mensana');
        $this->migrator->add('post_page.meta_keywords_en', 'Animal News, Animal Health Articles, Livestock Information, Mensana Innovation');
        $this->migrator->add('post_page.meta_og_img_id', '');
        $this->migrator->add('post_page.meta_og_img_en', '');
    }
};
