<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        // create logic for generating faker data with 2 language use locale
        // you can use a method to generate the data

        return [
            'title' => $this->titleData(),
            'body' => $this->contentData(),
            'meta_title' => $this->titleData(),
            'meta_description' => $this->metaDescriptionData(),
            'meta_keywords' => $this->metaKeywordsData(),
        ];
    }

    private function titleData(): array
    {
        $faker_en = \Faker\Factory::create('en_US');
        $faker_id = \Faker\Factory::create('id_ID');

        return [
            'en' => $faker_en->sentence,
            'id' => $faker_id->sentence,
        ];
    }

    private function contentData(): array
    {
        $faker_en = \Faker\Factory::create('en_US');
        $faker_id = \Faker\Factory::create('id_ID');

        return [
            'en' => $faker_en->paragraph,
            'id' => $faker_id->paragraph,
        ];
    }

    private function metaDescriptionData(): array
    {
        $faker_en = \Faker\Factory::create('en_US');
        $faker_id = \Faker\Factory::create('id_ID');

        return [
            'en' => $faker_en->paragraph,
            'id' => $faker_id->paragraph,
        ];
    }

    private function metaKeywordsData(): array
    {
        $faker_en = \Faker\Factory::create('en_US');
        $faker_id = \Faker\Factory::create('id_ID');

        return [
            'en' => implode(', ', $faker_en->words(3)),
            'id' => implode(', ', $faker_id->words(3)),
        ];
    }
}
