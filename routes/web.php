<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    //$posts = Post::where('user_id', auth()->user()->id)->get();
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class,'register']);

Route::post('/logout', [UserController::class,'logout']);

Route::post('/login', [UserController::class,'login']);

Route::post('/create-post', [PostController::class,'createPost']);

Route::get('/edit-post/{post}', [PostController::class,'showEdit']);

Route::put('/edit-post/{post}', [PostController::class,'edit']);

Route::delete('/delete-post/{post}', [PostController::class,'delete']);