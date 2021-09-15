<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NotificationController;
use App\Services\Mailer\MailService;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\FilepondController;

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
// Route::get('/admin/redirect/appeal/{appeal}', [AnswerController::class, 'redirect'])->name('answer.redirect');
// Route::get('/admin/appeal/update/{appeal}', [AnswerController::class, 'update'])->name('answer.update');
Route::get('/admin/redirect/appeal/{appeal}', [AnswerController::class, 'toExpert'])->name('answer.redirect');
Route::post('/admin/appeal/update/{appeal}', [AnswerController::class, 'updateAnswer'])->name('appeal.update');
Route::get('/admin/appeal/{appeal}/send', [AnswerController::class, 'sendAnswer'])->name('answer.send');
Route::post('/appeal/chat/close/{appeal}', [ConversationController::class, 'close'])->name("appeal.close");


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/botman/tinker', [BotManController::class, 'tinker']);

Route::get('notify',[NotificationController::class, 'notify']);
Route::view('/notification', 'notification');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    // Route::get('/appeal/chat/{chat}', [ChatController::class, 'index'])->name("answer.chat");
    // Route::post('/appeal/chat/post', [ChatController::class, 'addd'])->name("chat.post");
    Route::post('/appeal/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
    Route::get('/appeal/chat/{appeal}', [ConversationController::class, 'index'])->name("conversation.index");


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

Route::get("/widget/set", [HelperController::class, 'getSetting'])->name('widget');
Route::post("/upload",[FilepondController::class,"upload"]);
