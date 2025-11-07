<?php

namespace App\Livewire\Articles;

use App\Models\Category;
use App\Models\Category\SubCategory;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class IndexArticle extends Component
{
    const ITEMS_PER_PAGE = 6;

    public $categories;
    public $sub_categories;

    public $postIdChunks = [];
    public $page = 1;
    public $maxPage = 1;
    public $queryCount = 0;

    public $showSubFilter = false;


    #[Url(history: true, as: 'category', keep: false)]
    public $category = '';

    public $filterTopicArticles = [];

    public function mount($categories)
    {
        $this->categories = $categories;
        $this->prepareChunks();

        $this->defineSubFilter();
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

        $this->reset('filterTopicArticles');

        if(
            empty($this->category) ||
            $category != $this->category ){
            $set_category = $category;
        }

        $this->category = $set_category;

        $this->prepareChunks();

        $this->defineSubFilter();
    }

    public function defineSubFilter(){
        $this->showSubFilter = false;


        if (!empty($this->category)) {
            $category = Category::findBySlug($this->category);
            $sub_categories = SubCategory::where('category_id', $category->id)->get();

            if ($sub_categories->count()) {
                $this->showSubFilter = true;
                $this->sub_categories = $sub_categories;
            }

        }
    }

    public function prepareChunks()
    {
        $this->postIdChunks = DB::table('articles')
            ->when($this->category, function (QueryBuilder $builder) {
                $category = Category::findBySlug($this->category);
                if ($category) {
                    $builder->where('category_id', $category->id)
                        ->when($this->filterTopicArticles, function (QueryBuilder $builder) {
                            $builder->whereIn('id', function ($query) {
                                $query->select('article_id')
                                    ->from('subcategory_articles')
                                    ->whereIn('sub_category_id', $this->filterTopicArticles);
                            });
                        });
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

    public function filterArticleTopic()
    {
        $this->prepareChunks();
    }

    public function resetFilterArticle()
    {
        $this->reset('filterTopicArticles');
        $this->prepareChunks();
    }
}
