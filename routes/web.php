<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\AdminController;

Route::get('/',[UserTypeController::class, 'homepage']);

Route::get('/dashboard',[UserTypeController::class, 'login_home'])->
    middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders',[UserTypeController::class, 'myorders'])->
    middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[UserTypeController::class,'index'])->
    middleware(['auth','admin']);

route::get('view_category',[AdminController::class,'view_category'])->
    middleware(['auth','admin']);

route::post('add_category',[AdminController::class,'add_category'])->
    middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->
    middleware(['auth','admin']);

route::get('edit_category/{id}',[AdminController::class,'edit_category'])->
    middleware(['auth','admin']);
 
route::post('update_category/{id}',[AdminController::class,'update_category'])->
    middleware(['auth','admin']);
 
route::get('add_product',[AdminController::class,'add_product'])->
    middleware(['auth','admin']);
 
route::post('upload_product',[AdminController::class,'upload_product'])->
    middleware(['auth','admin']);

route::get('view_product',[AdminController::class,'view_product'])->
    middleware(['auth','admin']); 

route::get('delete_product/{id}',[AdminController::class,'delete_product'])->
    middleware(['auth','admin']); 

route::get('update_product/{id}',[AdminController::class,'update_product'])->
    middleware(['auth','admin']); 

route::post('edit_product/{id}',[AdminController::class,'edit_product'])->
    middleware(['auth','admin']);

route::get('product_search',[AdminController::class,'product_search'])->
    middleware(['auth','admin']);

route::get('product_details/{id}',[UserTypeController::class,'product_details']);

route::get('shop',[UserTypeController::class,'shop']);

route::get('why',[UserTypeController::class,'why']);

route::get('contact',[UserTypeController::class,'contact']);

route::get('testimonial',[UserTypeController::class,'testimonial']);

route::get('add_cart/{id}',[UserTypeController::class,'add_cart'])->
    middleware(['auth','verified']);

route::get('mycart',[UserTypeController::class,'mycart'])->
    middleware(['auth','verified']);

route::get('delete_cart/{id}',[UserTypeController::class,'delete_cart'])->
    middleware(['auth','verified']);

route::post('confirm_order',[UserTypeController::class,'confirm_order'])->
    middleware(['auth','verified']);

route::get('view_orders',[AdminController::class,'view_orders'])->
    middleware(['auth','admin']);

route::get('otw/{id}',[AdminController::class,'otw'])->
    middleware(['auth','admin']);

route::get('completed/{id}',[AdminController::class,'completed'])->
    middleware(['auth','admin']);

route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->
    middleware(['auth','admin']);

route::get('order_search',[AdminController::class,'order_search'])->
    middleware(['auth','admin']);

Route::controller(UserTypeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
    });