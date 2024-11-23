<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactUsController;
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
    return view('admin.index');
})->name(''); 

Route::get('/', function () {
    return view('admin.index');
})->name('admin.dashboard'); 

Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/addUser','create' )->name('addUser');
// Route::get('/userDetails','create' )->name('userDetails');
Route::post('/storeUser','store' )->name('storeUser');
});

Route::controller(PetController::class)->prefix('admin/pets')->name('admin.pets.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/addPet','create' )->name('addPet');
Route::get('/editPet','store' )->name('editPet');
});

Route::controller(CategoryController::class)->prefix('admin/categories')->name('admin.categories.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/addCategory','create' )->name('addCategory');
Route::post('/storeCategory','store' )->name('storeCategory');
});

Route::controller(ServiceController::class)->prefix('admin/services')->name('admin.services.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/serviceDetails','show' )->name('show');
});

Route::controller(OrderController::class)->prefix('admin/orders')->name('admin.orders.')->group(function(){
    Route::get('/','index' )->name('index');
    Route::get('/orderDetails','show' )->name('show');
});

Route::controller(ItemController::class)->prefix('admin/items')->name('admin.items.')->group(function(){
    Route::get('/','index' )->name('index');
    Route::get('/itemDetails','show' )->name('show');
});

Route::controller(AppointmentController::class)->prefix('admin/appointments')->name('admin.appointments.')->group(function(){
    Route::get('/','index' )->name('index');
    Route::get('/appointmentDetails','show' )->name('show');
});

Route::controller(ContactUsController::class)->prefix('admin/contactUs')->name('admin.contactUs.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/contactUsDetails','show' )->name('show');
});

Route::get('/adminProfile', function(){
    return view('admin.adminsTable.profile');
})->name('adminProfile');
Route::middleware(['auth'])->group(function () {
    Route::get('/index', function(){
        return view('admin.index');
    })->name('admin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
