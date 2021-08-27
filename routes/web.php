<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\NotificationController;
use App\Services\Mailer\MailService;
use Illuminate\Support\Facades\Hash;
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
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/botman/tinker', [BotManController::class, 'tinker']);

Route::get('notify',[NotificationController::class, 'notify']);
Route::view('/notification', 'notification');
Route::get('send', function(){
    $mailer = new MailService();
    $password = $hashed_random_password = Hash::make(str_random(8));
    $mailer->sendMail('Markoletter0@gmail.com', 'Asadbek', "test");
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
