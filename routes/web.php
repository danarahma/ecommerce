<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontendController@index')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index')->name('admin-home');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


Route::get('admin/categories', 'Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store', 'Admin\CategoryController@StoreCat')->name('store.category');
Route::get('admin/categories/edit/{cat_id}', 'Admin\CategoryController@Edit');
Route::post('admin/categories-update', 'Admin\CategoryController@UpdateCat')->name('update.category');
Route::get('admin/categories/delete/{cat_id}', 'Admin\CategoryController@Delete');
Route::get('admin/categories/inactive/{cat_id}', 'Admin\CategoryController@Inactive');
Route::get('admin/categories/active/{cat_id}', 'Admin\CategoryController@Active');


Route::get('admin/brands', 'Admin\BrandController@index')->name('admin.brands');
Route::post('admin/brands-store', 'Admin\BrandController@StoreBrand')->name('store.brand');
Route::get('admin/brands/edit/{brand_id}', 'Admin\BrandController@Edit');
Route::post('admin/brands-update', 'Admin\BrandController@UpdateBrand')->name('update.brand');
Route::get('admin/brands/delete/{brand_id}', 'Admin\BrandController@Delete');
Route::get('admin/brands/inactive/{brand_id}', 'Admin\BrandController@Inactive');
Route::get('admin/brands/active/{brand_id}', 'Admin\BrandController@Active');


Route::get('admin/products/add', 'Admin\ProductController@addProduct')->name('add-products');
Route::post('admin/products/store', 'Admin\ProductController@StoreProduct')->name('store-products');
Route::get('admin/products/manage', 'Admin\ProductController@ManageProduct')->name('manage-products');
Route::get('admin/products/edit/{product_id}', 'Admin\ProductController@Edit');
Route::post('admin/products-update', 'Admin\ProductController@UpdateProduct')->name('update.product');
Route::post('admin/products/image-update', 'Admin\ProductController@UpdateImage')->name('update-image');
Route::get('admin/products/delete/{product_id}', 'Admin\ProductController@Delete');
Route::get('admin/products/inactive/{product_id}', 'Admin\ProductController@Inactive');
Route::get('admin/products/active/{product_id}', 'Admin\ProductController@Active');


Route::get('admin/coupon', 'Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupons-store', 'Admin\CouponController@StoreCoupon')->name('store.coupon');
Route::get('admin/coupons/edit/{coupon_id}', 'Admin\CouponController@Edit');
Route::post('admin/coupons-update', 'Admin\CouponController@UpdateCoupon')->name('update.coupon');
Route::get('admin/coupons/delete/{coupon_id}', 'Admin\CouponController@Delete');
Route::get('admin/coupons/inactive/{coupon_id}', 'Admin\CouponController@Inactive');
Route::get('admin/coupons/active/{coupon_id}', 'Admin\CouponController@Active');


Route::post('add/to-cart/{product_id}', 'CartController@addToCart');
Route::get('cart', 'CartController@Cart')->name('cart');
Route::get('cart/destroy/{cart_id}', 'CartController@CartDestroy')->name('cart.destroy');
Route::post('cart/quantity/update/{cart_id}', 'CartController@UpdateQty');
Route::post('coupon/apply', 'CartController@CouponApply');
Route::get('coupon/destroy', 'CartController@CouponDestroy');


Route::get('add/to-wishlist/{product_id}', 'WishlistController@addToWishlist');
Route::get('wishlist', 'WishlistController@wishlist');
Route::get('wishlist/destroy/{wishlist_id}', 'WishlistController@Destroy')->name('cart.destroy');



Route::get('product/details/{product_id}', 'FrontEndController@details');


Route::get('checkout', 'CheckoutController@index');
Route::post('place/order', 'OrderController@storeOrder')->name('place-order');
Route::get('order/success', 'OrderController@orderSuccess');
