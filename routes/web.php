<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\MyworkController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FserviceController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\student\StudentStudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified',\App\Http\Middleware\UserMiddleware::class])->name('dashboard');

Route::resource('services',ServiceController::class)->middleware([\App\Http\Middleware\UserMiddleware::class]);
Route::resource('bookings',BookingController::class)->middleware([\App\Http\Middleware\UserMiddleware::class]);
Route::resource('customers',CustomerController::class)->middleware([\App\Http\Middleware\UserMiddleware::class]);
Route::resource('myworks',MyworkController::class)->middleware([\App\Http\Middleware\UserMiddleware::class]);


Route::get('our-services',[FserviceController::class,'index'])->name('service');
Route::get('single-service/{service}',[FserviceController::class,'show'])->name('showservice');
Route::get('book-service/{service}',[FserviceController::class,'bookForm'])->name('bookservice');
Route::post('book-service/{service}', [FserviceController::class, 'storeBooking'])->name('storeBooking');

Route::get('mybooking', [FserviceController::class, 'showbook'])->name('bookingsindex');
Route::get('bookingdetails/{invoice}', [FserviceController::class, 'bookingdetails'])->name('bookingdetails');

Route::get('esewa/{invoice}', [FserviceController::class, 'esewaPayment'])->name('esewa');


Route::post('/admin/bookings/{invoice}/add-photos-link', [BookingController::class,'addGooglePhotosLink'])->name('admin.addGooglePhotosLink');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/our-blogs', [BlogController::class,'index'])->name('frontend.blogs');