<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirects', [HomeController::class,'redirects'])->name('redirects')->middleware('auth','verified');
Route::get('/',[HomeController::class,'index'])->name('index');
Route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');
Route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
Route::get('/DeleteCategoryName/{id}',[AdminController::class,'deleteCategory'])->name('DeleteCategoryName');
Route::get('/viewProduct',[AdminController::class,'viewProduct'])->name('viewProduct');
Route::post('/uploadProduct',[AdminController::class,'uploadProduct'])->name('uploadProduct');
Route::get('/showProduct',[AdminController::class,'showProduct'])->name('showProduct');
Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct'])->name('deleteProduct');
Route::get('/editViewProduct/{id}',[AdminController::class,'editViewProduct'])->name('editViewProduct');
Route::post('/updateProduct/{id}',[AdminController::class,'updateProduct'])->name('updateProduct');
Route::get('/view_order',[AdminController::class,'view_order'])->name('view_oeder');
Route::get('/delivered/{id}',[AdminController::class,'delivered'])->name('delivered');
Route::get('/processing/{id}',[AdminController::class,'processing'])->name('processing');
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf'])->name('print_pdf');
Route::get('/send_email/{id}',[AdminController::class,'send_email'])->name('send_email');
Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email'])->name('send_user_email');
Route::get('/search_order_data',[AdminController::class,'search_order_data']);
Route::get('/dashboard_view',[AdminController::class,'dashboard_view'])->name('dashboard_view');
Route::get('/user_show',[AdminController::class,'user_show'])->name('user_show');
Route::get('/productDetails/{id}',[HomeController::class,'productDetails'])->name('productDetails');
Route::post('/add_cart/{id}',[HomeController::class,'add_cart'])->name('add_cart');
Route::get('/show_cart',[HomeController::class,'show_cart'])->name('show_cart');
Route::get('/delete_cart/{id}',[HomeController::class,'delete_cart'])->name('delete_cart');
Route::get('cash_order',[HomeController::class,'cash_order'])->name('cash_order');
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe'])->name('stripe');
Route::post('/stripe.post/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');