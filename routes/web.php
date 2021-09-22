<?php

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


Route::group(['middleware' => ['authenticate', 'roles']], function (){
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
});

#لوحة التحكم
Route::prefix('/admin')->middleware('can:update-books')->group(function() {
    Route::get('/', 'App\Http\Controllers\adminscontroller@index')->name('admin.index'); 

    Route::resource('/books', 'App\Http\Controllers\bookscontroller');
    Route::resource('/categories', 'App\Http\Controllers\categoriescontroller');
    Route::resource('/publishers', 'App\Http\Controllers\publisherscontroller');
    Route::resource('/authors', 'App\Http\Controllers\authorscontroller');
    Route::resource('/users', 'App\Http\Controllers\userscontroller')->middleware('can:update-users');
});
#الرئيسية
Route::get('/main', 'App\Http\Controllers\maincontroller@index')->name('main.index');


#البحث
Route::get('/', 'App\Http\Controllers\gallerycontroller@index')->name('gallery.index');

Route::get('/search', 'App\Http\Controllers\galleryController@search')->name('search');
#تفاصيل الكتاب والتقييمات
Route::get('/book/{book}', 'App\Http\Controllers\bookscontroller@details')->name('book.details');
Route::post('/book/{book}/rate','App\Http\Controllers\bookscontroller@rate')->name('book.rate');
#الاقسام
Route::get('/categories', 'App\Http\Controllers\categoriescontroller@list')->name('gallery.categories.index');
Route::get('/categories/search', 'App\Http\Controllers\categoriescontroller@search')->name('gallery.categories.search');
Route::get('/categories/{category}', 'App\Http\Controllers\categoriescontroller@result')->name('gallery.categories.show');
#الناشرين
Route::get('/publishers', 'App\Http\Controllers\publisherscontroller@list')->name('gallery.publishers.index');
Route::get('/publishers/search', 'App\Http\Controllers\publisherscontroller@search')->name('gallery.publishers.search');
Route::get('/publishers/{publisher}', 'App\Http\Controllers\publisherscontroller@result')->name('gallery.publishers.show');
#المؤلفين
Route::get('/authors', 'App\Http\Controllers\authorscontroller@list')->name('gallery.authors.index');
Route::get('/authors/search', 'App\Http\Controllers\authorscontroller@search')->name('gallery.authors.search');
Route::get('/authors/{author}', 'App\Http\Controllers\authorscontroller@result')->name('gallery.authors.show');
#سله الشراء
Route::post('/cart', 'App\Http\Controllers\cartcontroller@addtocart')->name('cart.add');
Route::get('/cart', 'App\Http\Controllers\cartcontroller@viewcart')->name('cart.view');
Route::post('/removeone/{book}', 'App\Http\Controllers\cartcontroller@removeone')->name('cart.remove_one');
Route::post('/removeall/{book}', 'App\Http\Controllers\cartcontroller@removeall')->name('cart.remove_all');