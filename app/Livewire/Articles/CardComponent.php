<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class CardComponent extends Component
{

    public $postIds;

    public function render()
    {
        $posts = Article::find($this->postIds)->keyBy('id');

        return view('livewire.articles.card-component', [
            'articles' => $posts
        ]);
    }
}
