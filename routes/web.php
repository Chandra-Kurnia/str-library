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

// Route::get('/', function () {
//     return view('main');
// });

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/siswa', 'UsersController@siswa');
Route::get('/petugas', 'UsersController@petugas');
Route::get('/create-user', 'UsersController@create');
Route::post('/create-user', 'UsersController@store');
Route::get('/delete-siswa/{id}', 'UsersController@destroy_siswa');
Route::get('/delete-petugas/{id}', 'UsersController@destroy_petugas');
Route::get('/update-account/{id}', 'UsersController@edit');
Route::post('/update-account/{id}', 'UsersController@update');

//for books
Route::get('/create-book', 'BooksController@create');
Route::post('/create-book', 'BooksController@store');
Route::get('/update-book/{id}', 'BooksController@edit');
Route::post('/update-book/{id}', 'BooksController@update');
Route::get('/books/category/{category}', 'BooksController@index')->name('category'); //show category
Route::get('/delete/{id}', 'BooksController@destroy');
Route::get('/books/search/{category}', 'BooksController@search');
Route::get('books/category/{category}/search', 'BooksController@search'); //search

//users-siswa-borrow
Route::get('/borrow/{id}', 'BooksController@show');
Route::post('/borrow/{id}', 'BooksController@borrow');
Route::get('/myBorrowedBook/{id}', 'BooksController@showBorrowed');
//user-act
Route::get('/returned/{id}', 'ReturnedBookController@store');
Route::get('/unverification/{id}', 'ReturnedBookController@unverification');
Route::get('/myReturnedBooks/{id}', 'ReturnedBookController@showReturned');
Route::get('/cancel-return/{id}', 'ReturnedBookController@cancelReturn');

//lib-act
Route::get('lib-act/borrowedBooks', 'libraryController@showBorrowed');
Route::get('lib-act/returnedBooks', 'libraryController@showReturned');
Route::get('lib-act/returnVer', 'libraryController@returnVer');
Route::get('lib-act/verify/{id}', 'libraryController@verify');

//print-pdf and destroy
Route::get('/print-pdf', 'pdfController@print');
Route::get('/destroy-data', 'BooksController@clear');
