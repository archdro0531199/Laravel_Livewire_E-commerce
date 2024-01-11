<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Member\ItemController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:member', 'prefix' => 'member', 'as' => 'member.'], function() {
        Route::resource('item', \App\Http\Controllers\Member\ItemController::class);
    });
	Route::group(['middleware' => 'role:seller', 'prefix' => 'seller', 'as' => 'seller.'], function() {
		Route::resource('product', \App\Http\Controllers\Seller\ProductController::class);
		
	});
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});

Route::prefix('/product')->group(function(){
    Route::get('/', [\App\Http\Controllers\Seller\ProductController::class, 'index'])->name('product.index');
    // Add a new product
    Route::get('/create', [\App\Http\Controllers\Seller\ProductController::class, 'create'])->name('product.create');
    // Store a new product
    Route::post('/store', [\App\Http\Controllers\Seller\ProductController::class, 'store'])->name('product.store');
    // Edit a product
    Route::get('/edit/{id}', [\App\Http\Controllers\Seller\ProductController::class, 'edit'])->name('product.edit');
    // Update a product
    Route::post('/update/{id}', [\App\Http\Controllers\Seller\ProductController::class, 'update'])->name('product.update');
    // Delete a product
    Route::delete('/delete/{product_id}', [\App\Http\Controllers\Seller\ProductController::class, 'delete'])->name('product.delete');
    // Set active
    Route::get('/set-active/{product_id}', [\App\Http\Controllers\Seller\ProductController::class, 'setActive'])->name('product.setActive');
    // Set inactive
    Route::get('/set-inactive/{product_id}', [\App\Http\Controllers\Seller\ProductController::class, 'setInactive'])->name('product.setInactive');
    // View a product
    Route::get('/view/{product_id}', [\App\Http\Controllers\Seller\ProductController::class, 'view'])->name('product.view');
	// Product Config
	Route::get('/product_config', [\App\Http\Controllers\Seller\ProductController::class, 'product_config'])->name('product.product_config');
});

Route::prefix('/item')->group(function(){
    Route::get('/', [\App\Http\Controllers\Member\ItemController::class, 'index'])->name('item.index');
	Route::get('/view/{company_id}', [\App\Http\Controllers\Member\ItemController::class, 'view'])->name('item.view');
	Route::get('/itemview/{product_id}', [\App\Http\Controllers\Member\ItemController::class, 'itemview'])->name('item.itemview');
	Route::get('/checkout', [\App\Http\Controllers\Member\ItemController::class, 'checkout'])->name('item.checkout');
});

Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);

/*Route::get('/user/item', function () {
    $products = Product::all();

    return view('user.item.index', compact('products'));
})->name('index');*/