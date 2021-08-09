<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\LoginController;
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
    $data = [
        'title'  => 'It.Next - Ichione',
        'active' => 'home'
    ];

    $data['products'] = Product::all();

    return view('pages.home.home', $data);
});

Route::get('login', function () {
    return view('login');
});

Route::post('login_admin','LoginController@LoginAdmin');

Route::group(['prefix' => 'admin',  'middleware' => 'CheckAdmin'], function()
{
    Route::get('/', function () {
        return view('admin.home.home');
    });

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->name('product.index');

        Route::get('create', function () {
            $brands = Brand::all();
            $data['brands'] = $brands;
            return view('admin.products.add', $data);
        })->name('product.create');

        Route::post('/','ProductController@productAdd')->name('product.add');

        Route::get('/{id}', 'ProductController@Edit')->name('product.show');

        Route::post('/{id}','ProductController@productEdit')->name('product.edit');

    });

    // Brand
    Route::prefix('brand')->group(function () {

        Route::get('/', 'BrandController@index')->name('brand.index');

        Route::post('/list','BrandController@listBrands')->name('brand.list');

        Route::post('/','BrandController@brandAdd')->name('brand.add');

        Route::get('/{id}', 'BrandController@Edit')->name('brand.show');

        Route::post('/{id}','BrandController@brandEdit')->name('brand.edit');
    });

    // Category
    Route::prefix('category')->group(function () {

        Route::get('/', 'CategoryController@index')->name('category.index');

        Route::post('/list','CategoryController@listCategories')->name('category.list');

        Route::post('/','CategoryController@categoryAdd')->name('category.add');

        Route::get('/{id}', 'CategoryController@Edit')->name('category.show');

        Route::post('/{id}','CategoryController@categoryEdit')->name('category.edit');
    });

    Route::get('logout_admin', function () {
        Auth::logout();
        return redirect('admin/login');
    });
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});