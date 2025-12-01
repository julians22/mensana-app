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
                    $lowerKeyword = '%' . strtolower($keyword) . '%'; // Hanya perlu dihitung sekali

                    $query->where(function ($query) use ($lowerKeyword) {
                        // 1. name
                        $query->whereRaw('LOWER(name) LIKE ?', [$lowerKeyword])
                            // 2. description->id & description->en
                            // description->id
                            ->orWhereRaw('LOWER(JSON_EXTRACT(description, "$.id")) LIKE ?', [$lowerKeyword])
                            // description->en
                            ->orWhereRaw('LOWER(JSON_EXTRACT(description, "$.en")) LIKE ?', [$lowerKeyword])

                            // 3. subtitle->id & subtitle->en
                            // subtitle->id
                            ->orWhereRaw('LOWER(JSON_EXTRACT(subtitle, "$.id")) LIKE ?', [$lowerKeyword])
                            // subtitle->en
                            ->orWhereRaw('LOWER(JSON_EXTRACT(subtitle, "$.en")) LIKE ?', [$lowerKeyword])

                            // 4. excerpt->id & excerpt->en
                            // excerpt->id
                            ->orWhereRaw('LOWER(JSON_EXTRACT(excerpt, "$.id")) LIKE ?', [$lowerKeyword])
                            // excerpt->en
                            ->orWhereRaw('LOWER(JSON_EXTRACT(excerpt, "$.en")) LIKE ?', [$lowerKeyword]);

                        // 5. Pencarian pada Relationships (tags)
                        // Di sini kita masih menggunakan orWhereHas, tetapi di dalamnya kita menerapkan whereRaw
                        $query->orWhereHas('tags', function ($query) use ($lowerKeyword) {
                            $query->whereRaw('LOWER(JSON_EXTRACT(name, "$.id")) LIKE ?', [$lowerKeyword])
                                ->orWhereRaw('LOWER(JSON_EXTRACT(name, "$.en")) LIKE ?', [$lowerKeyword]);
                        });

                        // 6. Pencarian pada Relationships (animals)
                        $query->orWhereHas('animals', function ($query) use ($lowerKeyword) {
                            $query->whereRaw('LOWER(JSON_EXTRACT(name, "$.id")) LIKE ?', [$lowerKeyword])
                                ->orWhereRaw('LOWER(JSON_EXTRACT(name, "$.en")) LIKE ?', [$lowerKeyword]);
                        });
                    });

                    // Catatan Khusus untuk JSON_EXTRACT:
                    // - Jika Anda menggunakan PostgreSQL, ganti JSON_EXTRACT(column, "$.key") dengan (column->>'key').
                    // - Untuk penggunaan yang lebih sederhana pada kolom non-JSON, Anda dapat menggunakan syntax yang Anda sebutkan:
                    //   $query->orWhereRaw('LOWER(column_biasa) LIKE ?', [$lowerKeyword]);
                    // - Anda harus memastikan kolom 'name' di `name->id` dan `name->en` adalah kolom JSON, bukan kolom biasa.
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
