<?php

namespace App\Livewire\SearchResults;

use App\Models\Article;
use App\Models\Products\Product;
use App\Settings\ServicepageSetting;
use Illuminate\Support\Collection;
use Livewire\Component;

class Section extends Component
{

    public ?string $sectionTitle = null;

    public int $maxResult = 10;

    public Collection $results;

    public function mount(string $sectionTitle, string $keyword)
    {
        $this->sectionTitle = $sectionTitle;

        if (empty($keyword)) {
            $this->results = collect([]);
        }else{
            // clean keyword / sanitize
            $keyword = htmlspecialchars(strip_tags($keyword));
            $this->search($keyword);
        }
    }

    public function search(string $keyword)
    {

        if ($this->sectionTitle == 'Products') {
            $this->results = Product::query()
                ->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('description->id', 'like', '%' . $keyword . '%')
                    ->orWhere('description->en', 'like', '%' . $keyword . '%')
                    ->orWhere('subtitle->id', 'like', '%' . $keyword . '%')
                    ->orWhere('subtitle->en', 'like', '%' . $keyword . '%')
                    ->orwhere('excerpt->id', 'like', '%' . $keyword . '%')
                    ->orWhere('excerpt->en', 'like', '%' . $keyword . '%')
                    ->orWhereHas('tags', function ($query) use ($keyword) {
                        $query->where('name->id', 'like', '%' . $keyword . '%')
                            ->orWhere('name->en', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('animals', function ($query) use ($keyword) {
                        $query->where('name->id', 'like', '%' . $keyword . '%')
                            ->orWhere('name->en', 'like', '%' . $keyword . '%');
                    });
                })
                ->take($this->maxResult)
                ->get();
        }

        if ($this->sectionTitle == 'Articles') {
            $this->results = Article::query()
                ->when($keyword, function ($query) use ($keyword) {
                    $query->where('title->id', 'like', '%' . $keyword . '%')
                        ->orWhere('title->en', 'like', '%' . $keyword . '%')
                        ->orWhere('excerpt->id', 'like', '%' . $keyword . '%')
                        ->orWhere('excerpt->en', 'like', '%' . $keyword . '%')
                        ->orWhere('body->id', 'like', '%' . $keyword . '%')
                        ->orWhere('body->en', 'like', '%' . $keyword . '%')
                        ->orWhereHas('category', function ($query) use ($keyword) {
                            $query->where('name->id', 'like', '%' . $keyword . '%')
                                ->orWhere('name->en', 'like', '%' . $keyword . '%');
                        });
                })
                ->take($this->maxResult)
                ->get();
        }

        if ($this->sectionTitle == 'Services') {

            $dataSections = app(ServicepageSetting::class)->section_contents;

            $filteredSections = collect($dataSections)->filter(function ($section) use ($keyword) {
                return str_contains(strtolower($section['title_id']), strtolower($keyword)) ||
                       str_contains(strtolower($section['title_en']), strtolower($keyword)) ||
                       str_contains(strtolower($section['body_id']), strtolower($keyword)) ||
                       str_contains(strtolower($section['body_en']), strtolower($keyword));
            });

            $this->results = $filteredSections->take($this->maxResult);
        }
    }


    public function render()
    {
        return view('livewire.search-results.section');
    }
}
