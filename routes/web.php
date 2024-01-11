<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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

Route::fallback(function () {
    return 'EROR GAN';
});
