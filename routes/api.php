<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/kitaplar','App\Http\Controllers\KitapController@index')->name('kitap.index');
Route::post('/kitaplar/{id}/update','App\Http\Controllers\KitapController@update')->name('kitap.update');
Route::post('/kitaplar/{id}/delete','App\Http\Controllers\KitapController@destroy')->name('kitap.delete');
