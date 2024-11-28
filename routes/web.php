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


Route::middleware(['auth'])->group(function () {
    Route::get('/adminProfile', function(){
        return view('admin.adminsTable.profile');
    })->name('adminProfile');
    Route::controller(ContactUsController::class)->prefix('admin/contactUs')->name('admin.contactUs.')->group(function(){
        Route::get('/','index' )->name('index');
        Route::get('/contactUsDetails','show' )->name('show');
        });

        Route::get('/', function () {
            return view('admin.index');
        })->name(''); 
        
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.dashboard'); 
        
        Route::controller(UserController::class)->prefix('admin/users')->name('admin.users.')->group(function(){
        Route::get('/','index' )->name('index');
        Route::get('/addUser','create' )->name('addUser');
        Route::post('/storeUser','store' )->name('storeUser');
        Route::get('/editUser/{id}/edit','edit' )->name('editUser');
        Route::get('/showUser/{id}/show','show' )->name('showUser');
        Route::put('/updateUser/{id}' , 'update')->name('updateUser');
        Route::delete('deleteUser/{id}' , 'destroy')->name('deleteUser');
        });
        
        Route::controller(ItemController::class)->prefix('admin/items')->name('admin.items.')->group(function(){
            Route::get('/','index' )->name('index');
            Route::get('/addiItem','create' )->name('addPet');
            Route::post('/storeItem', 'store')->name('storeItem');
            Route::get('/editItem/{id}/edit', 'edit')->name('editItem');
            Route::put('/updateItem/{id}', 'update')->name('updateItem');
            Route::delete('/deleteItem/{id}', 'destroy')->name('deleteItemItem');
        });

        Route::controller(PetController::class)->prefix('admin/pets')->name('admin.pets.')->group(function(){
        Route::get('/','index' )->name('index');
        Route::get('/addPet','create' )->name('addPet');
        Route::post('/storePet','store' )->name('storePet');
        Route::get('/editPet/{id}/edit','edit' )->name('editPet');
        Route::patch('/updatePet/{id}','update' )->name('updatePet');
        Route::delete('/deletePet/{id}','destroy' )->name('deletePet'); 
    });
    
    Route::controller(ServiceController::class)->prefix('admin/services')->name('admin.services.')->group(function(){
        Route::get('/','index' )->name('index');
        Route::get('/addService','create' )->name('addService');
        Route::post('/storeService','store' )->name('storeService');
        Route::get('/editService/{id}/edit','edit' )->name('editService');
        Route::patch('/updateService/{id}','update' )->name('updateService');
        Route::delete('/deleteService/{id}','destroy' )->name('deleteService');
        });

    Route::controller(CategoryController::class)->prefix('admin/categories')->name('admin.categories.')->group(function(){
        Route::get('/','index' )->name('index');
        Route::get('/addCategory','create' )->name('addCategory');
        Route::post('/storeCategory','store' )->name('storeCategory');
    });
        
        Route::controller(AppointmentController::class)->prefix('admin/appointments')->name('admin.appointments.')->group(function(){
            Route::get('/','index' )->name('index');
            Route::get('/addAppointment','create' )->name('addAppointment');
            Route::post('/storeAppointment','store' )->name('storeAppointment');
        });
        
        Route::controller(OrderController::class)->prefix('admin/orders')->name('admin.orders.')->group(function(){
            Route::get('/','index' )->name('index');
            // Route::get('/orderDetails','show' )->name('show');
        });
        
        
        
        
});


Route::view('/show','admin.OrdersTable.show' )->name('viewhamza');
require __DIR__.'/auth.php';
