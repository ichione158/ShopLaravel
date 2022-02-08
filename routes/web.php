<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        'title'  => 'Sketchy',
        'active' => 'home'
    ];

    $data['products'] = Product::all();

    return view('pages.home.home', $data);
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('login_user','LoginController@Login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdmin'], function()
{
    Route::get('home/logout_admin', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('admin.logout');

    Route::get('/home', function () {
        return view('admin.home.home');
    })->name('admin');

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->name('product.index');

        Route::get('create', function () {
            $brands = Brand::where('status', '=', '1')->get();
            $data['brands'] = $brands;
            return view('admin.products.add', $data);
        })->name('product.create');

        Route::get('/listDelete', 'ProductController@indexProductDelete')->name('product.indexProductDelete');

        Route::post('/','ProductController@productAdd')->name('product.add');

        Route::get('/{id}', 'ProductController@Edit')->name('product.show');

        Route::post('/{id}','ProductController@productEdit')->name('product.edit');

        Route::post('change_status/{id}', function ($id) {
            $data = [
                'status' => $_POST['value']
            ];
            
            Product::where('id', '=', $id)->update($data);
        });
    });

    // Brand
    Route::prefix('brand')->group(function () {

        Route::get('/', 'BrandController@index')->name('brand.index');

        Route::post('/list','BrandController@listBrands')->name('brand.list');

        Route::post('/','BrandController@brandAdd')->name('brand.add');

        Route::get('/{id}', 'BrandController@Edit')->name('brand.show');

        Route::post('/{id}','BrandController@brandEdit')->name('brand.edit');

        Route::delete('brand_delete/{id}', function ($id) {
            $data = [
                'status' => 0
            ];
            
            Brand::where('id', '=', $id)->update($data);
        });
    });

    // Category
    Route::prefix('category')->group(function () {

        Route::get('/', 'CategoryController@index')->name('category.index');

        Route::post('/list','CategoryController@listCategories')->name('category.list');

        Route::post('/','CategoryController@categoryAdd')->name('category.add');

        Route::get('/{id}', 'CategoryController@Edit')->name('category.show');

        Route::post('/{id}','CategoryController@categoryEdit')->name('category.edit');

        Route::delete('cate_delete/{id}', function ($id) {
            $data = [
                'category_status' => 0
            ];
            
            Category::where('id', '=', $id)->update($data);
        });
    });

    // Category
    Route::prefix('post')->group(function () {

        Route::get('/', 'PostController@index')->name('post.index');

        Route::get('/create', function () {
            $categories = Category::where('category_status', '=', '1')->get();
            $data['categories'] = $categories;
            return view('admin.posts.add', $data);
        })->name('post.create');

        Route::post('/','PostController@postAdd')->name('post.add');

        Route::get('/{id}', 'PostController@Edit')->name('post.show');

        Route::post('/{id}','PostController@postEdit')->name('post.edit');

        // Route::delete('cate_delete/{id}', function ($id) {
        //     $data = [
        //         'category_status' => 0
        //     ];
            
        //     Category::where('id', '=', $id)->update($data);
        // });

    });

    // Order 
    Route::prefix('order')->group(function () {
        Route::get('/', 'CartController@index')->name('order.index');

        Route::post('/order_product', 'CartController@orderProduct')->name('order.order_product');

        Route::post('/udate_status', 'CartController@updateStatus')->name('order.update_status');
    });
});

Route::get('/product/{slug}', function ($slugString) {
    $data['title'] = 'Shop Detail';
    
    $data['product'] = Product::where('slug','=',$slugString)->firstOrFail();

    return view('pages.products.detail', $data);
})->name('product.detail');

Route::group(['prefix' => 'cart', 'middleware' => 'CheckLogin'], function()
{
    Route::get('/list', 'CartController@userCart')->name('cart.list');

    Route::post('addToCart/{id}', 'CartController@addToCart')->name('cart.add');

    Route::post('updateCart', 'CartController@updateCart')->name('cart.update');

    Route::get('checkout', 'CartController@checkoutCart')->name('cart.checkout');

    Route::post('order', 'CartController@orderCart')->name('cart.order');
});

Route::group(['prefix' => 'user', 'middleware' => 'CheckLogin'], function()
{
    Route::get('/order', 'UserController@orderHistory')->name('user.order');

    Route::post('/order_product', 'UserController@orderProduct')->name('user.order_product');

    Route::get('/change_pass', 'UserController@viewChangePassword')->name('user.view_change_password');

    Route::post('/change', 'UserController@changePass')->name('user.change_pass');

    Route::post('/updateCart', 'UserController@updateCart')->name('user.updateCart');
});

Route::get('/contact', function () {
    $data = [
        'title'  => 'Sketchy - Contact',
        'active' => 'contact'
    ];
    return view('pages.support.contact', $data);
})->name('contact');

Route::get('/about', function () {
    $data = [
        'title'  => 'Sketchy - About',
        'active' => 'contact'
    ];
    return view('pages.support.about', $data);
})->name('about');

Route::post('/contact', 'ContactController@addContact')->name('contact.add');