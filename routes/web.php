<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/', [ContactController::class, 'confirm'])->name('confirm');
    Route::post('/confirm', [ContactController::class, 'create'])->name('create');
    Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');
    Route::get('/admin', [ContactController::class, 'search'])->name('search');
    Route::post('/admin/delete', [ContactController::class, 'delete'])->name('delete');
});
