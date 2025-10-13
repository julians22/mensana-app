<?php

namespace App\Livewire\Product;

use App\Models\Products\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public array $categories;
    public array $animals;
    public array $tags;

    public $selectCategories = [];
    public $selectAnimals = [];
    public $selectTags = [];

    #[Url(as: 'product_keyword')]
    public string $search = '';

    public array $filter_collections = [];

    public function mount($categories, $animals, $tags)
    {
        $this->categories = $categories;
        $this->animals = $animals;
        $this->tags = $tags;
    }

    public function updatedSelectCategories($value, $key)
    {
        if ($value != '__rm__') {
            $this->filter_collections['categories'][$key] = $value;
        }else{
            unset($this->filter_collections['categories'][$key]);
        }

        $this->resetPage();
    }

    public function updatedSelectAnimals($value, $key)
    {
        if ($value != '__rm__') {
            $this->filter_collections['animals'][$key] = $value;
        }else{
            unset($this->filter_collections['animals'][$key]);
        }

        $this->resetPage();
    }

    public function unsetFilter($collection, $filter_value)
    {

        if ($collection == 'categories') {
            // unset selectedCategories if the value is == $filter_values
            foreach ($this->selectCategories as $key => $value) {
                if ($value == $filter_value) {
                    unset($this->selectCategories[$key]);
                }
            }
        }else if ($collection == 'animals') {
            foreach ($this->selectAnimals as $key => $value) {
                if ($value == $filter_value) {
                    unset($this->selectAnimals[$key]);
                }
            }
        }else if ($collection == 'tags') {
            unset($this->selectTags[$filter_value]);
        }


        foreach ($this->filter_collections[$collection] as $key => $value) {
            if ($value == $filter_value) {
                unset($this->filter_collections[$collection][$key]);
            }
        }
    }

    public function searchProducts()
    {
        // $this->validate();
    }



    public function render()
    {
        return view('livewire.product.index-product', [
            'products' => Product::query()
                ->when(!empty($this->search), function ($query) {
                    $animals = $this->selectAnimals;
                    $categories = $this->selectCategories;
                    if (count($animals)) {
                        $query->whereHas('animals', function ($query) use ($animals) {
                            $where = [];
                            foreach ($animals as $key => $value) {
                                $where[] = $value;
                            }
                            $query->whereIn('id', $where);
                        });
                    }

                    if (count($categories)) {
                        $query->whereHas('categories', function ($query) use ($categories) {
                            $where = [];
                            foreach ($categories as $key => $value) {
                                $where[] = $value;
                            }
                            $query->whereIn('id', $where);
                        });
                    }

                    $query->where('name', 'like', "%$this->search%");

                }, function($query){
                    $animals = $this->selectAnimals;
                    $categories = $this->selectCategories;
                    $query
                        ->when(count($categories), function ($query) use ($categories) {
                            // dd('here');
                            $query->whereHas('categories', function ($query) use ($categories) {
                                $where = [];
                                foreach ($categories as $key => $value) {
                                    $where[] = $value;
                                }
                                $query->whereIn('id', $where);
                            });
                        })
                        ->when(count($animals), function ($query) use ($animals) {
                            $query->whereHas('animals', function ($query) use ($animals) {
                                $where = [];
                                foreach ($animals as $key => $value) {
                                    $where[] = $value;
                                }
                                $query->whereIn('id', $where);
                            });
                        });
                })
                ->where('is_active', 1)->paginate(12),
        ]);
    }
}
