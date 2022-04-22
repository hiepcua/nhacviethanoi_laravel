<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tim-kiem', function(Request $request){
    return 'page tìm kiếm';
})->name('tim-kiem');

Route::get('/khuyen-mai', function(Request $request){
    return 'page khuyen-mai';
})->name('khuyen-mai');

Route::get('/san-pham-moi', function(Request $request){
    return 'page san-pham-moi';
})->name('san-pham-moi');