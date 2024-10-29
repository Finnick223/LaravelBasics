<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AuthorController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);
Route::get('/books/{id}/delete', 'BookController@destroy');
Route::resource('loans', LoanController::class);
Route::resource('authors', AuthorController::class);
