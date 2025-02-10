<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LessonController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// contact me
Route::get('/contact-me', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact-me', [ContactController::class, 'submit'])->name('contact.submit');

// checkout
Route::get('checkout/success/{transaction}', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');
Route::get('/checkout/{cart}', [PaymentController::class, 'checkout'])->name('checkout');

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

// Admin only middleware group
Route::middleware(["auth", "verified", CheckAdmin::class])->group(function () {
    Route::get("/dashboard", [DashboardController::class, "show"])->name("dashboard");

    // Units
    Route::get("/units", [UnitController::class, 'index'])->name('units.index');
    Route::get("/units/new", [UnitController::class, 'new'])->name('units.new');
    Route::post("/units/store", [UnitController::class, 'store'])->name('units.store');
    Route::get("/units/edit/{unit}", [UnitController::class, 'edit'])->name('units.edit');
    Route::put("/units/update/{unit}", [UnitController::class, 'update'])->name('units.update');
    Route::delete("/units/destroy/{unit}", [UnitController::class, 'destroy'])->name('units.destroy');

    // Lessons
    Route::get("/units/{unit}", [LessonController::class, 'index'])->name('lessons.index');
});

require __DIR__.'/auth.php';
