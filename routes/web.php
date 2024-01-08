<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FoodController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
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


Route::get('/',[Frontendcontroller::class,'home'])->name('home');
    Route::get('/ram',[Frontendcontroller::class,'index'])->name('ram');
    Route::get('/contatc',[Frontendcontroller::class,'contact'])->name('contact');
    Route::post('/contact',[Frontendcontroller::class,'post'])->name('post');
    Route::get('/contact-list',[Frontendcontroller::class,'contactList'])->name('contact.list');
    Route::get('/contact/edit/{id}',[Frontendcontroller::class,'edit'])->name('contact.edit');
    Route::post('/contact/edit/{id}',[Frontendcontroller::class,'update'])->name('contact.update');
    Route::get('/contact/delete/{id}',[Frontendcontroller::class,'delete'])->name('contact.delete');

    Route::get('/about',[Frontendcontroller::class,'about'])->name('about');
   // Route::resource('/staff',StaffController::class)->name('any','staff');

Route::prefix('dashboard')->group(function(){
    Route::middleware(['checkRole'])->group(function(){
        Route::get('/home',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/user',[RoleController::class,'userHome'])->name('user');
        Route::get('/make-user/{id}',[RoleController::class,'makeUser'])->name('make.user');
        Route::get('/make-admin/{id}',[RoleController::class,'makeAdmin'])->name('make.admin');
        Route::get('/category',[CategoryController::class,'index'])->name('category');
        Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/category/create',[CategoryController::class,'store'])->name('category.store');
        Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/category/edit/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/food',[FoodController::class,'index'])->name('food');
        Route::get('/food/create',[FoodController::class,'create'])->name('food.create');
        Route::post('/food/create',[FoodController::class,'store'])->name('food.store');
        Route::get('/food/view/{slug}',[FoodController::class,'show'])->name('food.show');
        Route::get('/l',[DashboardController::class,'logouts'])->name('log');




        // Route::get('/food',)
    });
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// });

require __DIR__.'/auth.php';
