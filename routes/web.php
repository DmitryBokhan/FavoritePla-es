<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

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
});

require __DIR__.'/auth.php';
