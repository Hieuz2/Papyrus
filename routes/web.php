<?php

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





Route::get('/', function(){
    return view('login');
});



// Hiển thị trang đăng ký (Display registration form)

// Route::get('/register',[ \App\Http\Controllers\AuthController::class , 'showRegistrationForm'])->name('register');

// Xử lý đăng ký khi người dùng gửi biểu mẫu (Handle registration form submission)

Route::post('/register', [ \App\Http\Controllers\AuthController::class , 'register'])->name('register');

// Route::post('/register', [ \App\Http\Controllers\AuthController::class , 'quickCreateUser'])->name('register');

// Hiển thị trang đăng nhập (Display login form)
Route::get('/login',[ \App\Http\Controllers\AuthController::class , 'showLoginForm'])->name('login');

// Xử lý đăng nhập khi người dùng gửi biểu mẫu (Handle login form submission)
Route::post('/login', [ \App\Http\Controllers\AuthController::class , 'login']);


// Xử lý đăng xuất khi người dùng gửi biểu mẫu (Handle logout form submission)

Route::get('/logout',[ \App\Http\Controllers\AuthController::class , 'logout'])->name('logout');

// Trang dashboard cần xác thực người dùng đã đăng nhập (Dashboard page requires authentication)
Route::get('/productsLogin', 'AuthControllerr@showLoginForm')->middleware('auth.custom');

// Route::get('/login', 'AuthControllerr@showLoginForm')->middleware('auth.custom');

Route::resource('/users',\App\Http\Controllers\UsersController::class);

Route::get('/usersHome', [ \App\Http\Controllers\UsersController::class, 'index'])->name('usersHome');

Route::get('/indexAdmin', [ \App\Http\Controllers\indexAdminController::class, 'index'])->name('indexAdmin');

Route::get('/create', [ \App\Http\Controllers\UsersController::class, 'create'])->name('create');

Route::get('/ProductsManagement', [ \App\Http\Controllers\ProductsController::class, 'adminIndex'])->name('ProductsManagement');

Route::post('/create-user', [ \App\Http\Controllers\UsersController::class, 'store'])->name('users.create');

Route::get('/create-userTB', [ \App\Http\Controllers\UsersController::class, 'index'])->name('users.index');

Route::put('/update-user/{user}', [ \App\Http\Controllers\UsersController::class, 'update'])->name('users.update');

Route::delete('/delete-user/{user}', [ \App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/edit-user/{user}', [ \App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');

// Route::match(['get', 'post'], 'login', 'AuthController@login');

Route::post('/create-product', [ \App\Http\Controllers\ProductsController::class, 'store'])->name('products.create');

Route::get('/create-productTB', [ \App\Http\Controllers\ProductsController::class, 'adminIndex'])->name('products.adminIndex');

Route::get('/ProductsManagement', [ \App\Http\Controllers\ProductsController::class, 'adminIndex'])->name('ProductsManagement');

Route::get('/add-product', [ \App\Http\Controllers\ProductsController::class, 'create'])->name('add.product');

Route::get('/edit-product/{product}', [ \App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');

Route::put('/update-product/{product}', [ \App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');

Route::delete('/delete-product/{product}', [ \App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/productsLogin', [ \App\Http\Controllers\ProductsController::class, 'index']); 

Route::get('/homeAdmin', [ \App\Http\Controllers\ProductsController::class, 'indexHomeAdmin']); 

Route::get('/homeUser', [ \App\Http\Controllers\ProductsController::class, 'indexHomeUser']); 

// //-----
// Route::get('/get-more-products', [ \App\Http\Controllers\ProductsController::class, 'getMoreProducts']);

Route::get('/api/products', [ \App\Http\Controllers\ProductsController::class, 'apiGetMoreProducts']); 

Route::get('/home', [ \App\Http\Controllers\ProductsController::class, 'indexHome'])->name('home');

///

Route::get('/admin', [ \App\Http\Controllers\indexAdminController::class, 'index'])->name('admin');


Route::get('/purchase', 'PurchaseController@purchasePage')->middleware('auth.purchase');

//// XỬ LÝ CART

Route::post('/add-cart', [ \App\Http\Controllers\CartController::class, 'addToCart'])->name('add.cart');

Route::get('/remove-cart', [ \App\Http\Controllers\CartController::class, 'removeFromCart'])->name('remove.cart');

Route::get('/show-cart', [ \App\Http\Controllers\CartController::class, 'showCart'])->name('show.cart');






