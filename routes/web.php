<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request; 

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
  return view('index');
});



Route::resource('articles', ArticleController::class);
Route::get('/article/articles_pdf', [ArticleController::class, 'print_pdf'])->name('print_pdf');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('create');

Route::get('/print_pdf', 'MahasiswaController@print_pdf')->name('mahasiswa.print_pdf');
Route::get('/course/print_pdf/{mahasiswa}', [MahasiswaController::class, 'print_pdf'])->name('mahasiswa.print_pdf');
Route::get('showCourse/{mahasiswa}', [MahasiswaController::class, 'showCourse'])->name('mahasiswa.showCourse');
Route::resource('mahasiswa', MahasiswaController::class);


//Route::get('/about', function () {
  //  return view('about');
//});
//Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
//Route::get('/search', 'MahasiswaController@search')->name('mahasiswa.search');

//Route::get('/contact', function () {
  //  return view('contact');
//});
//Route::get('/gallery', function () {
  //  return view('gallery');
//});
//Route::get('/dinning', function () {
 //   return view('dinning');
//});
//Route::get('/news', function () {
  //  return view('news');
//});
/*
Route::get('/news', function () {
    return view('news');
});
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
