<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicSite\UserShopItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\PublicSite\UserCartController;
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
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');


Route::get('/', function(){
  return view('publicSite.homePage.index');
});


Route::get('/home', function(){
  return view('homeContainer');
})->name('homeContainer');


Route::post('/cart/add', [UserCartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [UserCartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/view-cart', [UserCartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update', [UserCartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/clear', [UserCartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/fetch', [UserCartController::class, 'fetch'])->name('cart.fetch');
Route::post('/side-cart/remove', [UserCartController::class, 'remove'])->name('side-cart.remove');




Route::get('/cart', function(){
  return view('publicSite.cart.cart');
});


Route::get('/shop', [UserShopItemController::class,'index'])->name('shop');
Route::get('/shop/{id}', [UserShopItemController::class, 'show'])->name('shop.show');

  

Route::get('/shopDetails', function(){
  return view('publicSite.shop-details.shop-details');
});

Route::middleware(['role:user'])->group(function () {
  


});
Route::middleware(['role:vet'])->group(function () {
  
 //add the admin route here

 Route::get('/index', function(){
  return view('admin.index');
})->name('admin.index');


Route::get('/adminProfile', function(){
  return view('admin.adminsTable.profile');
})->name('adminProfile');
Route::controller(ContactUsController::class)->prefix('admin/contactUs')->name('admin.contactUs.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/contactUsDetails','show' )->name('show');
});

Route::get('/admin', function () {
return view('admin.index');
})->name(''); 

Route::get('/admin', function () {
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
Route::get('/addItem','create' )->name('addItem');
Route::post('/storeItem', 'store')->name('storeItem');
Route::get('/editItem/{id}/edit', 'edit')->name('editItem');
Route::get('/showItem/{id}/show',action: 'show' )->name('showItem');
Route::put('/updateItem/{id}', 'update')->name('updateItem');
Route::delete('/deleteItem/{id}', 'destroy')->name('deleteItem');
});

Route::controller(PetController::class)->prefix('admin/pets')->name('admin.pets.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/addPet','create' )->name('addPet');
Route::post('/storePet','store' )->name('storePet');
Route::get('/editPet/{id}/edit','edit' )->name('editPet');
Route::get('/showPet/{id}/show',action: 'show' )->name('showPet');
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
Route::get('/editCategory/{id}/edit','edit' )->name('editCategory');
Route::patch('/updateCategory/{id}','update' )->name('updateCategory');
Route::delete('/deleteCategory/{id}','destroy' )->name('deleteCategory');
});

Route::controller(AppointmentController::class)->prefix('admin/appointments')->name('admin.appointments.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/addAppointment','create' )->name('addAppointment');
Route::post('/storeAppointment','store' )->name('storeAppointment');
Route::get('/editAppointment/{id}/edit','edit' )->name('editAppointment');
Route::patch('/updateAppointment/{id}','update' )->name('updateAppointment');
Route::delete('/deleteAppointment/{id}','destroy' )->name('deleteAppointment');
});

Route::controller(OrderController::class)->prefix('admin/orders')->name('admin.orders.')->group(function(){
Route::get('/','index' )->name('index');
Route::get('/addOrder','create' )->name('addOrder');
Route::post('/storeOrder','store' )->name('storeOrder');
Route::get('/showOrder/{id}/show',action: 'show' )->name('showOrder');
Route::get('/editOrder/{id}/edit','edit' )->name('editOrder');
Route::patch('/updateOrder/{id}','update' )->name('updateOrder');
Route::delete('/deleteOrder/{id}','destroy' )->name('deleteOrder');
});


Route::controller(OrderItemsController::class)->prefix('admin/orderItems')->name('admin.orderItems.')->group(function(){
  Route::get('/', 'index')->name('index');
  Route::get('/addOrderItem', 'create')->name('addOrderItems');
  Route::post('/storeOrderItem', 'store')->name('storeOrderItems');
  Route::get('/showOrderItems/{id}/show', 'show')->name('showOrderItems');
  Route::get('/editOrderItems/{id}/edit', 'edit')->name('editOrderItems');
  Route::patch('/updateOrderItems/{id}', 'update')->name('updateOrderItems');
  Route::delete('/deleteOrderItems/{id}', 'destroy')->name('deleteOrderItems');
});


Route::controller(WishListController::class)->prefix('admin/WishList')->name('admin.wishList.')->group(function(){
  Route::get('/', 'index')->name('index');
  Route::get('/addWishList', 'create')->name('addWishList');
  Route::post('/storeWishList', 'store')->name('storeWishList');
  Route::get('/showWishList/{id}/show', 'show')->name('showWishList');
  Route::get('/editWishList/{id}/edit', 'edit')->name('editWishList');
  Route::patch('/updateWishList/{id}', 'update')->name('updateWishList');
  Route::delete('/deleteWishList/{id}', 'destroy')->name('deleteWishList');
});
  

});


Route::get('/whyChooseUs', function(){
  return view('publicSite.whyChooseUs.whyChooseUs');
});

Route::get('/contactPage', function(){
  return view('publicSite.contactPage.contactPage');
});

Route::get('/checkout', function(){
  return view('publicSite.checkout.checkout');
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
