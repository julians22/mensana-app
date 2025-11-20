<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\HeroBanner;
use App\Models\Products\Animal;
use App\Models\Products\Category as ProductsCategory;
use App\Models\Products\Product;
use App\Models\Products\Tags;
use App\Settings\AboutpageSetting;
use App\Settings\ContactpageSetting;
use App\Settings\HomepageSetting;
use App\Settings\PostpageSetting;
use App\Settings\ProductpageSetting;
use App\Settings\ServicepageSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home_page(HomepageSetting $settings)
    {
        $featured_article = Article::isFeatured()->latest()->first();

        $articles = Article::take(3)->get();

        $products = Product::with('categories', 'animals', 'tags')->take(10)->get();

        $hero_banners = HeroBanner::take(3)->latest()->get();

        $locale = app()->getLocale();

        $site_title = $settings->{'title_'.$locale};
        $meta_description = $settings->{'meta_description_'.$locale};
        $meta_keywords = $settings->{'meta_keywords_'.$locale};
        $meta_og_img = $settings->{'meta_og_img_'.$locale};

        return view('home',
            compact(
                'articles',
                'featured_article',
                'products',
                'hero_banners',
                'site_title',
                'meta_description',
                'meta_keywords',
                'meta_og_img'
                )
        );
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about_page(AboutpageSetting $settings)
    {
        $locale = app()->getLocale();

        $hero_banner = $settings->hero_image;
        $hero_banner_mobile = $settings->hero_image_mobile;

        $hero_title = $settings->{'hero_title_'.$locale};
        $hero_subtitle = $settings->{'hero_subtitle_'.$locale};

        $site_title = $settings->{'title_'.$locale};
        $meta_description = $settings->{'meta_description_'.$locale};
        $meta_keywords = $settings->{'meta_keywords_'.$locale};
        $meta_og_img = $settings->{'meta_og_img_'.$locale};

        $achievements = $settings->achievements;

        $section_contents = $settings->section_contents;

        return view('about', compact('site_title', 'meta_description', 'meta_keywords', 'meta_og_img', 'hero_banner', 'hero_banner_mobile', 'hero_title', 'hero_subtitle', 'achievements', 'section_contents'));
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact_page(ContactpageSetting $settings)
    {
        $locale = app()->getLocale();

        $site_title = $settings->{'title_'.$locale};
        $meta_description = $settings->{'meta_description_'.$locale};
        $meta_keywords = $settings->{'meta_keywords_'.$locale};
        $meta_og_img = $settings->{'meta_og_img_'.$locale};

        $map_images = $settings->map_images;

        return view('contact', [
            'site_title' => $site_title,
            'meta_description' => $meta_description,
            'meta_keywords' => $meta_keywords,
            'meta_og_img' => $meta_og_img,
            'map_images' => $map_images
        ]);
    }

    /**
     * Show the service page.
     *
     * @return \Illuminate\View\View
     */
    public function service_page(ServicepageSetting $settings)
    {
        $locale = app()->getLocale();

        $hero_banner = $settings->hero_image;
        $hero_banner_mobile = $settings->hero_image_mobile;

        $hero_title = $settings->{'hero_title_'.$locale};
        $hero_subtitle = $settings->{'hero_subtitle_'.$locale};

        $site_title = $settings->{'title_'.$locale};
        $meta_description = $settings->{'meta_description_'.$locale};
        $meta_keywords = $settings->{'meta_keywords_'.$locale};
        $meta_og_img = $settings->{'meta_og_img_'.$locale};

        $section_contents = $settings->section_contents;

        return view('service', compact('site_title', 'meta_description', 'meta_keywords', 'meta_og_img', 'hero_banner', 'hero_banner_mobile', 'hero_title', 'hero_subtitle', 'section_contents'));
    }

    /**
     * Show the article page.
     *
     * @return \Illuminate\View\View
     */
    public function article_page(PostpageSetting $settings)
    {
        $locale = app()->getLocale();

        $site_title = $settings->{'title_'.$locale};
        $meta_description = $settings->{'meta_description_'.$locale};
        $meta_keywords = $settings->{'meta_keywords_'.$locale};
        $meta_og_img = $settings->{'meta_og_img_'.$locale};

        $categories = Category::all();

        $featured_articles = Article::isFeatured()->take(4)->get();

        return view('article', compact('categories', 'featured_articles', 'site_title', 'meta_description', 'meta_keywords', 'meta_og_img'));
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
    public function product_page(ProductpageSetting $settings)
    {
        $locale = app()->getLocale();
        $hero_banner = $settings->hero_image;
        $hero_banner_mobile = $settings->hero_image_mobile;

        $hero_title = $settings->{'hero_title_'.$locale};
        $hero_subtitle = $settings->{'hero_subtitle_'.$locale};

        $site_title = $settings->{'title_'.$locale};
        $meta_description = $settings->{'meta_description_'.$locale};
        $meta_keywords = $settings->{'meta_keywords_'.$locale};
        $meta_og_img = $settings->{'meta_og_img_'.$locale};

        $tags = Tags::all()->pluck('name', 'id')->toArray();
        $categories = ProductsCategory::all()->pluck('name', 'id')->toArray();
        $animals = Animal::all()->pluck('name', 'id')->toArray();

        return view('product', compact('tags', 'categories', 'animals', 'site_title', 'meta_description', 'meta_keywords', 'meta_og_img', 'hero_banner', 'hero_banner_mobile', 'hero_title', 'hero_subtitle'));
    }

    /**
     * Show the product detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function product_detail_page($slug)
    {
        $product = Product::with('categories', 'animals', 'tags')->where('slug', $slug)->firstOrFail();

        // get random category from $product->categories
        $categories = $product->categories;

        $randomCategory = null;
        if ($categories->isNotEmpty()) {
            $randomCategory = $categories->random();
        }

        return view('product_detail', compact('product', 'randomCategory'));
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
