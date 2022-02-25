<?php

use App\Http\Controllers\EmonthlyController;
use App\Http\Controllers\EyearlyController;
use App\Http\Controllers\LmanagementController;
use App\Http\Controllers\UserController;
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

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::get('/registration',[UserController::class, 'registration']);
Route::get('/dashboard',[UserController::class, 'dashboard']);

Route::get('/monthly/get',[EmonthlyController::class, 'getMonthly'])->name('getmonthly');
Route::get('/yearly/get',[EyearlyController::class, 'getYearly'])->name('getyearly');
Route::get('/loan/get',[LmanagementController::class, 'getLoan'])->name('getloan');

Route::get('/expenses/get',[EmonthlyController::class, 'Expenses'])->name('expenses');
Route::get('/yearly/expenses/get',[EyearlyController::class, 'YearlyExpense'])->name('yearlyexpense');
Route::get('/loan/repay/get',[LmanagementController::class, 'RepayLoan'])->name('repayloan');
Route::get('/paid/get',[LmanagementController::class, 'Paid'])->name('paid');

Route::post('/loan/repay/post/{id}',[LmanagementController::class, 'PostRepayLoan'])->name('postrepayloan');

Route::post('/monthly/post',[EmonthlyController::class, 'postMonthly'])->name('postmonthly');
Route::post('/yearly/post',[EyearlyController::class, 'postYearly'])->name('postyearly');
Route::post('/loan/post',[LmanagementController::class, 'postLoan'])->name('postloan');


Route::post('/login_user',[UserController::class, 'login_user'])->name('login_user');
Route::post('/register_user',[UserController::class, 'register_user'])->name('register_user');
Route::post('/logout',[UserController::class, 'logout'])->name('logout');

