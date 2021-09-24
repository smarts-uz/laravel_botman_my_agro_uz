<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\FilepondController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


Route::get('notify', [NotificationController::class, 'notify']);
Route::view('/notification', 'notification');

// Route::get('/{lang}/admin/', [ConversationController::class, 'setLang']);

Route::group(['prefix' => LaravelLocalization::setLocale() . '/admin', 'middleware' => ['localize', 'localizationRedirect'], ], function () {
    // User::where('id', Auth::user()->id)->update(['settings' => json_encode(['locale'=>app()->getLocale()])]);
    // User::where('id', Auth::user()->id)->update(['settings'=>json_encode(['locale' => app()->getLocale()])]);
    Voyager::routes();
    Route::get('/redirect/appeal/{appeal}', [ConversationController::class, 'toExpert'])->name('answer.redirect');
    Route::get('/appeals/chat/{appeal}', [ConversationController::class, 'showChat'])->name("conversation.index");
    Route::get("/appeals", [ConversationController::class, 'showAppeal'])->name('voyager.appeals.index');
    Route::post('/appeals/chat/rate/{appeal}', [ConversationController::class, 'rating'])->name("conversation.rating");
    Route::post('/appeal/chat/close/{appeal}', [ConversationController::class, 'close'])->name("appeal.close");
    Route::post('/appeal/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
});


Route::view("form", "form");
Route::post("/form/send", [FormController::class, "run"]);

Route::get('/', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
Route::post("/upload", [FilepondController::class, "upload"]);
Route::post("/fileUpload", [FilepondController::class, "fileUpload"]);

Route::get("/widget/set", [HelperController::class, 'getSetting'])->name('widget');
