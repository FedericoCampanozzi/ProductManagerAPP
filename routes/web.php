<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\ProductController;

/* Public Page */
Route::get("/", [PublicPageController::class, "index"]);
Route::get("/home", [PublicPageController::class, "index"])->name("home");
Route::get("/index", [PublicPageController::class, "index"])->name("index");
Route::get("/login", [PublicPageController::class, "index"])->name("login");
Route::get("/create", [PublicPageController::class, "create_product_page"])->name("create");
Route::get("/edit/{id}", [PublicPageController::class, "edit_product_page"])->name("edit");
Route::get("/show/{id}", [PublicPageController::class, "show_product_page"])->name("show");
/* *********** */

/* Public Page */
Route::get('/select-product', [ProductController::class, 'get']);
/* *********** */