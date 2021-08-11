<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['role:admin|moderator'])->prefix('admin_panel')->group(function (){
    // только админ и модераторы

    Route::get('/',[HomeController::class, 'index'])->name('homeAdmin'); //главная админки
    
    Route::resources(['category' => CategoryController::class]);
    Route::resources(['post' => PostController::class]);

});




require __DIR__.'/auth.php';
