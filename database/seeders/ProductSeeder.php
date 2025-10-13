<?php

namespace Database\Seeders;

use App\Models\Products\Animal;
use App\Models\Products\Category;
use App\Models\Products\Product;
use App\Models\Products\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_animals = array(
            array(
                "name" => "{\"en\":\"Cow\",\"id\":\"Sapi\"}",
                "slug" => "sapi",
            ),
            array(
                "name" => "{\"en\":\"Chicken\",\"id\":\"Ayam\"}",
                "slug" => "ayam",
            ),
            array(
                "name" => "{\"en\":\"Pig\",\"id\":\"Babi\"}",
                "slug" => "babi",
            ),
        );

        foreach ($product_animals as $animal) {
            DB::table('product_animals')->insert($animal);
        }

        $product_categories = array(
            array(
                "name" => "{\"en\":\"Premix\",\"id\":\"Premix\"}",
                "slug" => "premix",
            ),
            array(
                "name" => "{\"en\":\"Pharmasetik\",\"id\":\"Pharmasetik\"}",
                "slug" => "pharmasetik",
            ),
            array(
                "name" => "{\"en\":\"Herbal\",\"id\":\"Herbal\"}",
                "slug" => "herbal",
            ),
            array(
                "name" => "{\"en\":\"Vaccine\",\"id\":\"Vaksin\"}",
                "slug" => "vaksin",
            ),
        );


        foreach ($product_categories as $category) {
            DB::table('product_categories')->insert($category);
        }

        $products = [
            'Sanavac ND Clone',
            'Colimas',
            'Doxerin +',
            'Doxerin',
            'Medoxy LA',
            'Vita Stress',
            'Aminovit',
            'Biosporin',
            'Coxidin',
            'Enroflox',
            'Gentamycin Plus',
            'Inovac IBD',
            'Megavit',
            'Neomycin Sulfate',
            'Oxytetracycline',
            'Poultry Premix',
            'Sulfadimidine',
            'Tetra Chlor',
            'Tylosin Tartrate',
            'Vitamin B Complex',
            'Zinc Bacitracin',
            'Albendazole',
            'Colistin Sulfate',
            'Doxy + Colistin',
            'Egg Stimulant',
            'Florfenicol',
            'Growth Promoter',
            'Hepatoprotector',
            'Immune Booster',
            'Jamu Ternak',
        ];

        $descriptions = [
            'Vaksin aktif newcastle disease',
            'Kombinasi antibiotik spektrum luas',
            'Doxycycline dengan vitamin untuk terapi infeksi',
            'Antibiotik golongan tetracycline',
            'Long acting oxytetracycline',
            'Vitamin anti stress untuk unggas',
            'Suplemen asam amino lengkap',
            'Probiotik untuk kesehatan pencernaan',
            'Obat anti koksidiosis',
            'Antibiotik golongan fluoroquinolone',
            'Kombinasi gentamicin untuk infeksi gram negatif',
            'Vaksin IBD untuk pencegahan gumboro',
            'Multivitamin lengkap untuk ternak',
            'Antibiotik untuk infeksi saluran pencernaan',
            'Tetracycline spektrum luas',
            'Premix vitamin dan mineral',
            'Antibiotik golongan sulfa',
            'Chlortetracycline untuk terapi dan pencegahan',
            'Antibiotik untuk infeksi mycoplasma',
            'Vitamin B kompleks untuk metabolisme',
            'Antibiotik promotor pertumbuhan',
            'Obat cacing spektrum luas',
            'Antibiotik untuk infeksi gram negatif',
            'Kombinasi doxycycline dan colistin',
            'Meningkatkan produksi telur',
            'Antibiotik spektrum luas modern',
            'Suplemen untuk pertumbuhan optimal',
            'Melindungi fungsi hati',
            'Meningkatkan sistem kekebalan tubuh',
            'Herbal tradisional untuk kesehatan ternak',
        ];

        $animals = Animal::all();
        $categories = Category::all();
        $tags = Tags::all();

        foreach ($products as $index => $productName) {
            $product = Product::create([
                'name' => $productName,
                'description' => [
                    'id' => $descriptions[$index],
                ],
                'is_active' => true,
            ]);

            // Attach random animals (1-3 animals per product)
            $product->animals()->attach(
                $animals->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Attach random categories (1-2 categories per product)
            $product->categories()->attach(
                $categories->random(rand(1, 2))->pluck('id')->toArray()
            );

            // Attach random tags (2-4 tags per product)
            $product->tags()->attach(
                $tags->random(rand(1,2))->pluck('id')->toArray()
            );
        }

        $this->command->info('Created ' . count($products) . ' products with random relationships!');
    }
}
