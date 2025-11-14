<?php

namespace App\Livewire\Product;

use App\Models\Products\Category;
use Livewire\Component;

class RelatedProduct extends Component
{
    public Category $category;
    public function mount(Category $category, $current_product_id)
    {

        $this->category = $category->load(['products' => fn($query) => $query->where('id', '!=', $current_product_id)->inRandomOrder()->take(3)]);
    }

    public function render()
    {
        return view('livewire.product.related-product');
    }
}
