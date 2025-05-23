<?php

use App\Http\Controllers\Auth\MagicLinkController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OgImageController;
use App\Http\Controllers\Payments\StripeController;
use App\Http\Controllers\SitemapController;
use App\Http\Middleware\Subscribed;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', [HomeController::class, 'index']);
Volt::route('/', 'pages.home2')->name('home');
Volt::route('feedback', 'feedbackpage')->name('feedback');

Route::get('sitemap', [SitemapController::class, 'index'])->name('sitemap');
Route::get('changelog', [ChangelogController::class, 'index'])->name('changelog');

Volt::route('map', 'pages.map')->name('map');
Volt::route('places/{id}', 'pages.place')->name('places.show');
Volt::route('places', 'pages.places')->name('places.index');
Volt::route('shop', 'pages.shop')->name('shop.index');
Volt::route('cuisines', 'pages.cuisines')->name('cuisines.index');
Volt::route('locations', 'pages.locations')->name('locations.index');
Volt::route('dietary', 'pages.dietary')->name('dietary.index');
Volt::route('venue-types', 'pages.venue-types')->name('venue-types.index');
Volt::route('about', 'pages.about')->name('about');
Volt::route('business', 'pages.business')->name('business');
Volt::route('products', 'pages.products')->name('products');

// Demo Coming Soon Page
Route::get('coming-soon', function () {
    return view('pages.coming-soon');
})->name('coming-soon');

Route::prefix('auth')->group(function () {
    Route::get('/redirect/{driver}', [SocialiteController::class, 'redirect'])
        ->name('socialite.redirect');
    Route::get('/callback/{driver}', [SocialiteController::class, 'callback'])
        ->name('socialite.callback');

    // Magic Links
    Route::post('/magic-link', [MagicLinkController::class, 'sendMagicLink'])->name('magic.link');
    Route::get('/magic-link/{token}', [MagicLinkController::class, 'loginWithMagicLink'])->name('magic.link.login');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{article:slug}', [BlogController::class, 'article'])->name('blog.article');

// Dynamic Open Graph Image
Route::get('og-image/{title?}/{description?}', OgImageController::class)->name('og-image');

// For testing and modifying the default image template
Route::get('og-image-testing', function () {
    return view('seo.image', [
        'title' => 'Your dynamic og image',
        'description' => 'Your dynamic og image description', // optional
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Stripe Routes
    Route::prefix('stripe')->name('stripe.')->group(function () {
        Route::get('subscription-checkout/{price}', [StripeController::class, 'subscriptionCheckout'])->name('subscription.checkout');
        // If your product checkout does not require auth user,
        // move this part outside "auth:sanctum" middleware and change the logic inside method
        Route::get('product-checkout/{price}', [StripeController::class, 'productCheckout'])->name('product.checkout');
        Route::get('success', [StripeController::class, 'success'])->name('success');
        Route::get('error', [StripeController::class, 'error'])->name('error');
        Route::get('billing', [StripeController::class, 'billing'])->name('billing'); // Redirects to Customer Portal
    });

    Route::middleware([Subscribed::class])->group(function () {
        // Add endpoints that are only for subscribed users
    });
});

require_once __DIR__.'/emails.php';
