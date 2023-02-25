<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


/* For Admin Only */
Route::group(['prefix' => 'admin', 'middleware' => 'roles:Admin'], function(){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/users/token', [App\Http\Controllers\UserController::class, 'generateToken'])->name('users.generate-token');
});