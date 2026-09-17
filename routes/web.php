<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');
 
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
});
 
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UserController::class);
});

Route:: get('/index', function(){
    $posts=[
        (object)[
            'title' => 'Dzul keren',
            'content' => 'Content for Post 1',
            'published' => true,
            'created_at' => now(),
        ],
        (object)[
            'title' => 'fwan keren',
            'content' => 'Content for Post 2',
            'published' => true,
            'created_at' => now(),

        ],
        (object)[
            'title' => 'evan keren',
            'content' => 'Content for Post 3',
            'published' => true,
            'created_at' => now(),
        ],
    ];
    return view('posts.index', compact('posts'));
});

Route::get('/pos/history', function () {
    return 'Riwayat Transaksi Saya';
})->name('pos.history');