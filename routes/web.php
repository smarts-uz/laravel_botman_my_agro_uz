<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\NotificationController;
use App\Services\Mailer\MailService;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FormController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/answer/appeal/{appeal}', [AnswerController::class, 'answer'])->name('answer.reply');
Route::get('/admin/redirect/appeal/{appeal}', [AnswerController::class, 'redirect'])->name('answer.redirect');
Route::get('/admin/appeal/update/{appeal}', [AnswerController::class, 'update'])->name('answer.update');


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/botman/tinker', [BotManController::class, 'tinker']);

Route::get('notify',[NotificationController::class, 'notify']);
Route::view('/notification', 'notification');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

use Illuminate\Support\Facades\Mail;

Route::get('send-mail', function () {

    $details = [
        'title' => 'Asror Zokirov',
        'body' => 'Test mail sent by Laravel 8 using SMTP.'
    ];

    Mail::to('xolmuhammedovm@gmail.com')->send(new \App\Mail\SendMail($details));

    dd("Email is Sent, please check your inbox.");
});

Route::view("form", "form");

Route::post("/form/send", [FormController::class,"run"]);
Route::get('/', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
