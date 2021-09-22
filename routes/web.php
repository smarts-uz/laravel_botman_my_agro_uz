<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NotificationController;
use App\Services\Mailer\MailService;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\FilepondController;
use Illuminate\Support\Facades\Storage;

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

Route::view('/', 'welcome');
Route::get("/uzchat", [ChatController::class, "app"]);

Route::get('/admin/answer/appeal/{appeal}', [AnswerController::class, 'answer'])->name('answer.reply');
Route::get('/admin/redirect/appeal/{appeal}', [AnswerController::class, 'toExpert'])->name('answer.redirect');
Route::post('/admin/appeal/update/{appeal}', [AnswerController::class, 'updateAnswer'])->name('appeal.update');
Route::get('/admin/appeal/{appeal}/send', [AnswerController::class, 'sendAnswer'])->name('answer.send');

Route::post('/appeal/chat/close/{appeal}', [ConversationController::class, 'close'])->name("appeal.close");


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/botman/tinker', [BotManController::class, 'tinker']);

Route::get('notify', [NotificationController::class, 'notify']);
Route::view('/notification', 'notification');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('/appeal/chat/post', [ChatController::class, 'addd'])->name("chat.post");
    Route::post('/appeal/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
    Route::get('/appeals/chat/{appeal}', [ConversationController::class, 'showChat'])->name("conversation.index");
    Route::post('/appeals/chat/rate/{appeal}', [ConversationController::class, 'rating'])->name("conversation.rating");
    
});
Route::get("/admin/appeals", [ConversationController::class, 'showAppeal'])->name('voyager.appeals.index');

Route::view("form", "form");
Route::post("/form/send", [FormController::class, "run"]);

Route::get('/', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
Route::post("/upload", [FilepondController::class, "upload"]);
Route::post("/fileUpload", [FilepondController::class, "fileUpload"]);
Route::get("/widget/set", [HelperController::class, 'getSetting'])->name('widget');

