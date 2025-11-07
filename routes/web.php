<?php

use App\Http\Controllers\PageController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Web Routes
 *
 * Route list for frontend pages
 * All Pages use PageController
 * - Home Page
 * - About Page
 * - Contact Page
 * - Product Page
 * - Sub Product Page
 * - Article Page
 * - Sub Article Page
 * - Service Page
 */

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localizationRedirect']
], function()
{
    Route::get('', [PageController::class, 'home_page'])->name('home');
    Route::get('about', [PageController::class, 'about_page'])->name('about');
    Route::get('contact', [PageController::class, 'contact_page'])->name('contact');
    Route::get('service', [PageController::class, 'service_page'])->name('service');

    Route::get(LaravelLocalization::transRoute('routes.article'), [PageController::class, 'article_page'])->name('article.index');
    Route::get(LaravelLocalization::transRoute('routes.article_detail'), [PageController::class, 'article_detail_page'])->name('article.detail');;

    Route::group(['prefix' => 'product', 'as' => 'product.'], function() {
        Route::get('', [PageController::class, 'product_page'])->name('index');
        Route::get('{slug}', [PageController::class, 'product_detail_page'])->name('detail');
        // Route::get('dummy', [PageController::class, 'product_detail_page_dummy'])->name('detail');
    });

    // Livewire Routes
    \Livewire\Livewire::setUpdateRoute(function ($handle) {
        return Route::post('livewire/update', $handle);
    });
});


