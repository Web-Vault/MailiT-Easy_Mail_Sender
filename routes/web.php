<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailiTController;
use App\Http\Middleware\session_check;

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
    return view('login');
})->name('login');
Route::get('/signup', function () {
    return view('signup');
});


Route::post('indexLogin', [MailiTController::class , 'indexLogin']);
Route::post('indexSignup', [MailiTController::class , 'indexSignup']);

Route::get('index', [MailiTController::class, 'index'])->name('index')->middleware('session_check');

Route::get('/logout', [MailiTController::class, 'logout'])->name('logout');

Route::post('/upload_resume', [MailiTController::class, 'upload_resume'])->name('upload_resume');
Route::get('/remove_resume', [MailiTController::class, 'remove_resume'])->name('remove_resume');

Route::post('/send-mail', [MailiTController::class, 'send_mail'])->name('send-mail');
