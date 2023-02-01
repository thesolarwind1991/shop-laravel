<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Routing\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', 'MainController@index');

Route::get('/category', 'MainController@category');

Route::get('/product/{id}', 'MainController@product');
*/

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/category/{category}', [MainController::class, 'category'])->name('category');
Route::get('/product/{id}', [MainController::class, 'product'])->name('product');

Route::group([
    'middleware' => 'basket_not_empty',
], function() {
    Route::get('/cart', [BasketController::class, 'basket'])->name('cart');
    Route::get('/checkout', [BasketController::class, 'basketPlace'])->name('cart-checkout');
    Route::post('/cart/remove/{id}', [BasketController::class, 'basketRemove'])->name('basket-remove');
    Route::post('/checkout', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
});

Route::post('/basket/add/{id}', [BasketController::class, 'basketAdd'])->name('basket-add');
Route::post('/cart/add/{id}', [BasketController::class, 'basketAddCart'])->name('basket-add-cart');


Route::get('/contact', function () {
    return view('about');
})->name('contact');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/news', function () {
   return view('news');
})->name('blogs-news');


//Auth::routes();
Route::middleware(['auth'])->group(function() {
    Route::group([
        'prefix' => 'person',
        //'namespace' => 'Person',
        'as' => 'person.',
    ], function() {
        Route::get('/orders', [\App\Http\Controllers\Person\OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [\App\Http\Controllers\Person\OrderController::class, 'show'])->name('orders.show');
    });

    Route::group([
        //'namespace' => 'Admin',
        'prefix' => 'admin'
    ], function () {

        Route::group(['middleware' => 'is_admin'], function() {
            Route::get('/orders', [OrderController::class, 'index'])->name('orders');
            Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
            Route::resource('categories', CategoryController::class);
            Route::resource('products', ProductController::class);
        });


    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
