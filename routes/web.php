<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home.home', $data);
});

Route::get('admin/login', function () {
    return view('admin.login');
});

Route::post('login_admin','LoginController@LoginAdmin');

Route::group(['prefix' => 'admin',  'middleware' => 'CheckAdmin'], function()
{
    Route::get('/', function () {
        return view('admin.home.home');
    });

    // Product
    Route::prefix('product')->group(function () {
        
        Route::get('add', function () {
            return view('admin.products.add');
        });

        Route::get('edit/{id}', 'ProductController@Edit');

        Route::post('product_add','ProductController@productAdd');
        Route::post('product_edit/{id}','ProductController@productEdit');
    });

    // Brand
    Route::prefix('brand')->group(function () {
        Route::view('add', 'admin.brands.add');

        Route::post('brand_add','BrandController@brandAdd');
    });

    Route::get('logout_admin', function () {
        Auth::logout();
        return redirect('admin/login');
    });
});