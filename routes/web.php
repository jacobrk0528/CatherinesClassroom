<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;

use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

// checkout
Route::get('/checkout/{cart}', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('checkout/success', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');

// required auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// required auth and verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/order/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
});

// Addmin only middleware group
Route::middleware(["auth", "verified", CheckAdmin::class])->group(function () {
    Route::get("/dashboard", [DashboardController::class, "show"])->name("dashboard");
});

require __DIR__.'/auth.php';
