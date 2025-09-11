<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
        $featured_articles = Article::latest()->take(3)->get();

        return view('home', compact('featured_articles'));
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

        return view('article', compact('categories'));
    }

    /**
     * Show the article detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function article_detail_page($slug)
    {
        $article = Article::findBySlug($slug);
        return view('article_detail', compact('article'));
    }

    /**
     * Show the product page.
     *
     * @return \Illuminate\View\View
     */
    public function product_page()
    {
        return view('product');
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
}
