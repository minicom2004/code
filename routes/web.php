<?php

use App\Http\Controllers\CartUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckUser;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(CheckAuth::class)->group(function () {
    Route::prefix('admin')->group(function () {
        
      
        // http://127.0.0.1:8000/admin/movies
        Route::get('/movies', [MovieController::class, 'index'])->name('admin.movies.index');
        Route::get('/movies/create', [MovieController::class, 'create'])->name('admin.movies.create');
        Route::post('/movies', [MovieController::class, 'store'])->name('admin.movies.store');
        Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
        Route::put('/movies/{id}', [MovieController::class, 'update'])->name('admin.movies.update');
        Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
        // chi tiet 
        Route::get('/movies/{id}', [MovieController::class, 'show'])->name('admin.movies.show');
        // home
        Route::get('/home', [MovieController::class, 'home'])->name('admin.movies.home');

        // delete , list user 
        Route::get('/user', [MovieController::class, 'listUser'])->name('admin.user.listUser');
        Route::delete('/user/{id}', [MovieController::class, 'userDestroy'])->name('admin.user.destroy');
    });
    
});
Route::middleware(CheckAuth::class)->group(function () {});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// admin
Route::middleware('auth')->group(function () {
    // Routes cho profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// user Cart

Route::prefix('cartUser')->group(function () {
    Route::get('/cart', [CartUserController::class, 'listCart'])->name('CartUser.cart.listCart');
    Route::get('/cart/create',[CartUserController::class,'create'])->name('CartUser.cart.create');
    Route::post('/cart',[CartUserController::class,'store'])->name('CartUser.cart.store');
    Route::delete('/cart{id}',[CartUserController::class,'destroy'])->name('CartUser.cart.destroy');
});



require __DIR__ . '/auth.php';
