<?php

namespace App\Http\Controllers;

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
        return view('home');
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
        return view('article');
    }

    /**
     * Show the article detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function article_detail_page($slug)
    {
        return view('article_detail', compact('slug'));
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
