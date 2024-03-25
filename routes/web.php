<?php

use App\Http\Controllers\CookiesController;
use App\Http\Controllers\FileuploadController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Route::get('/prod/{id}', function ($productId) {
    return "product $productId";
});

Route::get('/employee/{id}', function ($employeeId) {
    return "employee $employeeId";
})->where('id', '[0-9]+');

Route::get('/manager/{id?}', function (string $managerId = '404') {
    return "manager {$managerId}";
});

Route::get('/customer/{id}', function ($custId) {
    return 'Customer : ' . $custId;
})->name('customer.detail');

Route::get('/customers/{id}', function ($custId) {
    $link = route('customer.detail', [
        'id' => $custId
    ]);
    return "Link : " . $link;
})->where('id', '^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$');

Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

Route::get('/controller/request', [HelloController::class, 'request']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);

Route::post('/input/hello/first', [InputController::class, 'first']);
Route::post('/input/helloinput', [InputController::class, 'helloInput']);

Route::post('/input/helloarray', [InputController::class, 'helloArray']);

Route::post('/file/upload', [FileuploadController::class, 'upload']);

Route::get('/response', [ResponseController::class, 'response']);
Route::get('/response/download', [ResponseController::class, 'download']);
Route::get('/response/file', [ResponseController::class, 'responseFile']);

Route::get('/cookie/set', [CookiesController::class, 'setCookies']);
Route::get('/cookie/get', [CookiesController::class, 'getCookies']);
Route::get('/cookie/clear', [CookiesController::class, 'clearCookies']);

Route::get('/redirect/hello/{name}', [RedirectController::class, 'hello'])->name('redirect-hello');
Route::get('/redirect/name', [RedirectController::class, 'name']);

Route::get('/middleware/api', function () {
    return 'OK';
})->middleware('contoh:PZN, 401');

Route::get('/form', [FormController::class, 'viewForm']);
Route::post('/form/submit', [FormController::class, 'submitForm']);

Route::get('/url/full', [UrlController::class, 'UrlFull']);
Route::get('/url/current', [UrlController::class, 'UrlCurrent']);

Route::controller(SessionController::class)->prefix('/session')->group(function () {
    Route::get('/set', 'setSession');
    Route::get('/get', 'getSession');
});

Route::get('/error/sample', function () {
    throw new Exception('sample exception');
});

Route::fallback(function () {
    return 'EROR GAN';
});
