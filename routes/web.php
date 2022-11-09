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
    'name' => 'Fairuz Akbar Azaria',
    'body' => 'Testing Kirim Email'
    ];
    
    Mail::to('fairuz.akbar.azaria@mail.ugm.ac.id')->send(new SendEmail($data));
    
    dd("Email Berhasil dikirim.");
});