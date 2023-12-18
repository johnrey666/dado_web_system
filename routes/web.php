<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AnimalController;

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

Route::get('/', function () {
    return view('../auth/login');
});

Auth::routes();


Route::get('/sidebar', function () {
    return view('sidebar');
});

Route::get('/admin', [AnimalController::class, 'adminDashboard'])->middleware('auth')->name('admin');

Route::get('/add', function () {
    return view('add');
})->middleware('auth')->name('add');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/signup', [WelcomeController::class, 'showSignupForm'])->name('signup.form');

Route::post('/signup', [WelcomeController::class, 'signup'])->name('signup');

Route::post('/add', [AnimalController::class, 'store'])->name('animals.store');

Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');

Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');

Route::get('/admin/dashboard', [AnimalController::class, 'adminDashboard'])->name('admin.dashboard');
Route::post('/admin/accept/{id}', [AnimalController::class, 'acceptAnimal'])->name('admin.accept');
Route::post('/admin/decline/{id}', [AnimalController::class, 'declineAnimal'])->name('admin.decline');
Route::get('/list', [AnimalController::class, 'index'])->middleware('auth')->name('list');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});