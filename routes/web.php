<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResizeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');
Route::get('/resize-file', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/resize-file', [App\Http\Controllers\PostController::class, 'resizeImage'])->name('resizeImage');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/another_home', function () {
    return view('another_home');
});

Route::get('/education', function () {
    return view('education');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', function () {
    return view('projects');
});

// Route::get('/halo/{nama?}', function ($nama = 'tanpa nama') {
//     return '<h1>halo nama saya ' . $nama . '</h1>';
// });

Route::resource('posts','App\Http\Controllers\PostController');
Route::resource('Views','App\Http\Controllers\ViewsController');

Route::get('/send-email-non',function(){
    $data = [
    'name' => 'Hello Fairuz Akbar Azaria!',
    'body' => 'This email was sent from laravel project website.'
    ];
    
    Mail::to('fairuz.akbar.azaria@mail.ugm.ac.id')->send(new SendEmail($data));
    
    dd("Email Berhasil dikirim.");
});

Route::get('/send-email',function(){
    return view('kirim-email');
});

Route::resource('gallery', 'App\Http\Controllers\GalleryController');
Route::get('/api/greet', 'App\Http\Controllers\GreetController@greet');
Route::get('/api/gallery', 'App\Http\Controllers\GreetController@gallery');