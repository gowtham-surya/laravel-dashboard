<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentController;

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

Route::resource('/products', ProductController::class);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registration']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm']);
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']);
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm']);
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

Route::resource('/department', DepartmentController::class);
Route::get('/department-export', [DepartmentController::class, 'export']);

Route::resource('/students', StudentController::class);
Route::get('/student-export', [StudentController::class, 'export']);
