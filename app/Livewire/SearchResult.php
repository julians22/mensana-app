<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchResult extends Component
{
    #[Url(as: 'q')]
    public $keyword;

    public function render()
    {
        return view('livewire.search-result');
    }
}
