<?php

namespace App\Console\Commands;

use App\Models\Products\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TranslatableFixProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:translatable-fix-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = DB::table('products')->get();

        foreach ($products as $product) {
            dump($product->id);
            dump($product->name);

            $translations = ['id' => $product->name];

            $productUpdate = Product::find($product->id);
            $productUpdate->setTranslations('name', $translations);
            $productUpdate->save();
        }
    }
}
