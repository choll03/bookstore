<?php

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
    return redirect('login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");
Route::get('/home', 'HomeController@index')->name('home');

Route::resource("users", "UserController");

Route::get('/categories/trash', 'ManageCategoryController@trash')->name('categories.trash');
Route::get('/categories/{id}/restore', 'ManageCategoryController@restore')->name('categories.restore');
Route::delete('/categories/{id}/delete-permanent', 'ManageCategoryController@deletePermanent')->name('categories.delete-permanent');
Route::resource('categories', 'ManageCategoryController');

Route::get('/ajax/categories/search', 'ManageCategoryController@ajaxSearch');

Route::get('/books/trash', 'ManageBookController@trash')->name('books.trash');
Route::post('/books/{id}/restore', 'ManageBookController@restore')->name('books.restore');
Route::delete('/books/{id}/delete-permanent', 'ManageBookController@deletePermanent')->name('books.delete-permanent');
Route::resource('books', 'ManageBookController');

Route::resource('orders', 'OrderController');


Route::get('/test/forbidden', function(){
    abort(403, "Anda tidak memiliki hak akses");
});

Route::get('/datatables/users', 'DatatablesController@data')->name('datatables.users');

Route::get('/test/me', function(){
    return \Auth::user();
});
