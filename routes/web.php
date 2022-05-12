<?php

use App\Http\Controllers\ApplyControll;
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

Route::get('/', function () {
    return view('pages.index');
});
Route::post('/store', [ApplyControll::class, 'store'])->name('store');
Route::post('/store/media', [ApplyControll::class, 'storeMedia'])->name('storeMedia');

Route::get('/list',[ApplyControll::class, 'index']);
Route::get('/list/{id}/detail', [ApplyControll::class, 'detail']);
Route::delete('/list/{id}', [ApplyControll::class, 'destroy']);