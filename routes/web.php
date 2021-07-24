<?php

use App\Admin\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    if(Auth::check()){
        return redirect("posts");
    }else{
        return redirect("login");
    }
});
Route::get("/profile/edit", [ProfileController::class,"edit"]);
Route::patch("/profile/edit", [ProfileController::class,"update"]);
Route::get("/profile", [ProfileController::class,"index"]);
Route::resource("posts", PostsController::class);
Auth::routes();
