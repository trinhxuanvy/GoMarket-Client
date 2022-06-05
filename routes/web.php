<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageStoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\UploadFileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("admin")->group(function () {
    Route::get("/manage", [AdminController::class, "index"]);
    Route::get("/manage/store", [AdminController::class, "storeList"])->name("storeList");
    Route::get("/manage/store/{id}", [AdminController::class, "index"]);
    Route::post('/manage/store/verifyStore', [AdminController::class, "verifyStore"]);
    Route::post('/manage/store/blockStore', [AdminController::class, "blockStore"]);
});

Route::prefix("store")->group(function () {
    //Route::get("/", [AdminController::class, "storeList"]);
    //Route::get("/manage/profile", [ManageStoreController::class, "profile"])->name("profile");
    Route::post("/manage/profile/{id}", [ManageStoreController::class, "updateProfile"]);
    Route::post("/manage/profile/uploadImage", [ManageStoreController::class, "uploadImage"]);
    Route::get('/manage/all-store', [ManageStoreController::class, "allStore"])->name("allStore");
    Route::get('/manage/profile/{id}', [ManageStoreController::class, "profile"])->name("store");
    Route::post("/manage/add-store", [ManageStoreController::class, "addStore"])->name("addStore");
});

Route::prefix("auth")->group(function () {
    //Route::get("/", [AdminController::class, "storeList"]);
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "postLogin"]);
    Route::get("/register", [AuthController::class, "register"])->name("register");
    Route::post("/register", [AuthController::class, "postRegister"]);
    Route::get("/logout", [AuthController::class, "logout"])->name("admin-logout");
});

Route::prefix("user")->group(function () {
    //Route::get("/", [AdminController::class, "storeList"]);
    Route::get("/auth/login", [AuthUserController::class, "login"])->name("user-login");
    Route::post("/auth/login", [AuthUserController::class, "postLogin"]);
    Route::get("/auth/register", [AuthUserController::class, "register"])->name("user-register");
    Route::post("/auth/register", [AuthUserController::class, "postRegister"]);
    Route::get("/auth/logout", [AuthUserController::class, "logout"])->name("user-logout");
});

Route::prefix("upload")->group(function () {
    Route::post("/image", [UploadFileController::class, "uploadImage"])->name("uploadFile");
});
