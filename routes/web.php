<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::get( '/', [
    'uses' => 'BoinkController@index',
    'as'   => '/',
] );
Route::get('/shop',            'BoinkController@shop' )                               ->name('shop');

Route::get('/product-details/{id}/{name}','PagesController@productDetails' )          ->name('product-details');

Route::get('/shop-cart',      'PagesController@shopCarts' )                           ->name('shop-cart');

Route::get('/checkout',       'PagesController@checkout' )                            ->name('checkout');

Route::get('/blog-details',   'PagesController@blogDetails' )                         ->name('blog-details');

Route::get('/blog',           'BlogController@blog' )                                 ->name('blog');

Route::get('/contact',        'ContactController@contact' )                           ->name('contact');

Route::get('/dashbord',       'dashbordController@dashbord' )                         ->name('dashbord');

Route::get('/add-category',    'categoryController@categoryAdd')                      ->name('add-category');

Route::get('/manage-category', 'categoryController@manageCategory')                   ->name('manage-category');

Route::post('/category/save', 'categoryController@saveCategory')                      ->name('new-category');

Route::get('category/manage', 'categoryController@manageCategory')                    ->name('manage-category');

Route::get('unpublished/category/{id}', 'categoryController@unpublished')             ->name('unpublish-category');

Route::get('published/category/{id}', 'categoryController@published')                 ->name('publish-category');

Route::get('edit/category/{id}', 'categoryController@edit')                           ->name('edit-category');

Route::post('update/category', 'categoryController@update')                           ->name('update');

Route::get('delete/category/{id}', 'categoryController@delete')                       ->name('delete-category');

Route::get('add/brand', 'BrandController@addBrand')                                   ->name('add-brand');

Route::get('manage/brand', 'BrandController@manageBrand')                             ->name('manage-brand');

Route::post('brand/save','BrandController@brandSave')                                 ->name('new-brand');

Route::get('unpublished/brand/{id}','BrandController@unpublic')                       ->name('unpublic-status');

Route::get('published/brand/{id}','BrandController@public')                           ->name('public-status');

Route::get('edit/brand/{id}', 'BrandController@editBrand')                            ->name('edit-brand');

Route::get('delete/brand/{id}', 'BrandController@deleteBrand')                        ->name('delete-brand');

Route::post('update/brand','BrandController@saveUpdateBrand')                         ->name('update-brand');

Route::get('add/product', 'ProductController@addProduct')                             ->name('add-product');

Route::post('new/product','ProductController@saveProduct')                            ->name('new-product');

Route::get('manage/product','ProductController@manageProduct')                        ->name('manage-product');

Route::get('unpublished/product/{id}','ProductController@Unpublic')                   ->name('Unpublic');

Route::get('public/product/{id}','ProductController@Public')                          ->name('Public');

Route::get('category/product/{id}/{name}','BoinkController@product')                  ->name('category-product');

Route::Post('add/to/cart','CartController@addToCart')                                 ->name('add-to-cart');

Route::get('cart/show','CartController@showCart')                                     ->name('show-cart');

Route::get('delete/card/item/{id}','CartController@deleteCard')                       ->name('delete-card-item');

Route::Post('update/cart/quantity','CartController@updateCart')                       ->name('update-cart');

Route::get('product/checkout','CheckoutController@checkout')                          ->name('checkout');

Route::POST('customer/signup','CheckoutController@signup')                            ->name('registration');

Route::get('customer/login','CheckoutController@login')                               ->name('login');

Route::get('customer/shipping','CheckoutController@shippingFrom')                     ->name('shipping');
