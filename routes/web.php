<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\NotificationController;
use App\Services\Mailer\MailService;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelperController;

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


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/botman/tinker', [BotManController::class, 'tinker']);

Route::get('notify',[NotificationController::class, 'notify']);
Route::view('/notification', 'notification');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/appeal/chat', [ChatController::class, 'index'])->name("answer.chat");
});


Route::view("form", "form");

Route::post("/form/send", [FormController::class,"run"]);
Route::get('/', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

Route::get("/widget/set", [HelperController::class, 'getSetting'])->name('widget');
