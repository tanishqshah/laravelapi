<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // return $request->user();
    // Route::get('/cart/{id}', [UserProductController::class, 'userProducts']);
    // Route::delete('/cart/{id}', [UserProductController::class, 'destroy']);
    Route::post('/cart/add', [userProductController::class, 'store']);
    // Route::put("/cart/update/{id}", [userProductController::class, 'update']);
    Route::delete("/removefromcart/{userid}/{productid}", [UserProductController::class, 'removeFromCart']);
});



Route::middleware('auth:sanctum')->get("/users/something", [UserController::class, "checkToken"]);



// admin 
Route::post('/admin/register', [AdminController::class, 'store']);
Route::post('/admin/login', [AdminController::class, 'login']);


// user 
Route::resource('/users', UserController::class);
// Route::post('/users/register', [UserController::class, 'store']);
Route::post('/users/login', [UserController::class, 'login']);


// cart 
Route::get('/cart/{id}', [UserProductController::class, 'userProducts']);
Route::delete('/cart/{id}', [UserProductController::class, 'destroy']);
// Route::post('/cart/add', [userProductController::class, 'store']);
Route::put("/cart/update/{id}", [userProductController::class, 'update']);
// Route::delete("/removefromcart/{userid}/{productid}", [UserProductController::class, 'removeFromCart']);


// category 
Route::resource('/categories', CategoryController::class);
Route::get('/category/products', [CategoryController::class, 'prod']);


// userreview 
Route::post('/user/review', [RevController::class, 'store']);
Route::get('/user/review', [RevController::class, 'index']);






// product 
Route::resource('/products', ProductController::class);
Route::get('/productswithcart/{id}', [ProductController::class, 'allProducts']);