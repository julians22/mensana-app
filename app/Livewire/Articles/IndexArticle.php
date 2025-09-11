<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class IndexArticle extends Component
{
    const ITEMS_PER_PAGE = 6;

    public $categories;

    public $postIdChunks = [];
    public $page = 1;
    public $maxPage = 1;
    public $queryCount = 0;


    #[Url(history: true, as: 'category', keep: false)]
    public $category = '';

    public function mount($categories)
    {
        $this->categories = $categories;
        $this->prepareChunks();
    }

    public function render()
    {
        return view('livewire.articles.index-article');
    }

    public function loadMore()
    {
        if ($this->hasNextPage()) {
            $this->page++;
        }
    }

    public function setCategory($category)
    {
        $set_category = '';

        if(
            empty($this->category) ||
            $category != $this->category ){
            $set_category = $category;
        }

        $this->category = $set_category;

        $this->prepareChunks();
    }

    public function prepareChunks()
    {
        $this->postIdChunks = DB::table('articles')
            ->when($this->category, function (QueryBuilder $builder) {
                $category = Category::findBySlug($this->category);
                if ($category) {
                    $builder->where('category_id', $category->id);
                }
            })
            ->orderBy('created_at', 'desc')
            ->pluck('id')
            ->chunk(self::ITEMS_PER_PAGE)
            ->toArray();

        $this->page = 1;
        $this->maxPage = count($this->postIdChunks);
        $this->queryCount++;
    }

    #[Computed()]
    public function hasNextPage(){
        return $this->page < $this->maxPage;
    }
}
