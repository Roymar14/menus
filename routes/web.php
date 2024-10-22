<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// 
Route::get('/', [FrontController::class, 'semuaPengaduan'])->name('guest.complaints');
Route::get('/complaint-statistics', [FrontController::class, 'semuaStatistik'])->name('guest.statistics');
Route::get('/complaint-form', [FrontController::class, 'formPengaduan'])->name('guest.formcomplaint');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
   // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   Route::group(['middleware' => 'guest'], function (): void {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [LoginController::class, 'register']);

});

Route::middleware( ["auth"])->group(function () {
    Route::post("logout", [LoginController::class,'logout'])->name('logout');
});

route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    route::get('/',[AdminController::class, 'index'])->name('admin.index');
    route::get('/users',[UserController::class, 'index'])->name('admin.users.index');

Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::post('/users/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
