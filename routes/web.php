<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->group(function() {
    Route::get("signup",[AuthController::class,"signupGet"])->name("auth.signup.get");
    Route::post("signup",[AuthController::class,"signupPost"])->name("auth.signup.post");
    Route::get("signin",[AuthController::class,"signinGet"])->name("auth.signin.get");
    Route::post("signin",[AuthController::class,"signinPost"])->name("auth.signin.post");
});


Route::prefix("admin")->group(function() {
    Route::get("",[AdminController::class,"index"]);
});

Route::resource("blogs",BlogController::class);

Route::resource("comments",CommentController::class)->except("index");
Route::get("/comments/blog/{blog}",[CommentController::class,"index"])->name("comments.index");

Route::post("blog/preview",[BlogController::class,"preview"]);
Route::get("fetch/blogs/{page?}",[BlogController::class,"fetchBlogs"]);
