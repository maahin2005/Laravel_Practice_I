<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/send-email', [ExampleController::class, 'sendEmail']);

Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Laravel!', function ($message) {
        $message->to('recipient@example.com')
                ->subject('Test Email');
    });

    return 'Mahin- Test email has been sent!';
});


Route::get('/redis-test', function () {
    Redis::set('test_key_m', 'Hello, Redis!');
    return Redis::get('test_key_m');
});

Route::get('/collections-test', [PostController::class,"showPostData"]);

Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'uploadFile'])->name('upload.file');



Route::get('/home', function () {
    return view('home');
});

Route::get('/about',function(){
    return view('about');
});

Route::get('/contact',function(){
    return view('contact');
});
