<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Products\Animal;
use App\Models\Products\Category as ProductsCategory;
use App\Models\Products\Product;
use App\Models\Products\Tags;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home_page()
    {
        $featured_article = Article::isFeatured()->latest()->first();

        $articles = Article::take(3)->get();

        return view('home', compact('articles', 'featured_article'));
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about_page()
    {
        return view('about');
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact_page()
    {
        return view('contact');
    }

    /**
     * Show the service page.
     *
     * @return \Illuminate\View\View
     */
    public function service_page()
    {
        return view('service');
    }

    /**
     * Show the article page.
     *
     * @return \Illuminate\View\View
     */
    public function article_page()
    {
        $categories = Category::all();


        $featured_articles = Article::isFeatured()->take(4)->get();

        return view('article', compact('categories', 'featured_articles'));
    }

    /**
     * Show the article detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function article_detail_page(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('article_detail', compact('article'));
    }

    /**
     * Show the product page.
     *
     * @return \Illuminate\View\View
     */
    public function product_page()
    {
        $tags = Tags::all()->pluck('name', 'id')->toArray();
        $categories = ProductsCategory::all()->pluck('name', 'id')->toArray();
        $animals = Animal::all()->pluck('name', 'id')->toArray();

        return view('product', compact('tags', 'categories', 'animals'));
    }

    /**
     * Show the product detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function product_detail_page($slug)
    {
        return view('product_detail', compact('slug'));
    }

    /**
     * Show the product detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function product_detail_page_dummy($slug)
    {
        return view('product_detail_dummy', compact('slug'));
    }
}
