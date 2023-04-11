<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDaskboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyPolicyController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\VichelesController;
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
Route::get('/', [UserController::class, '_index']);
Route::get('/contact', [UserController::class, '_contact']);
Route::get('/about', [UserController::class, '_about']);
Route::get('/help', [UserController::class, '_help']);
Route::post('/help', [HelpController::class, '_help'])->name('help');
Route::get('/helpMessage', [HelpController::class, '_helpMessage'])->name('help');

Route::get('/signupPage', [UserController::class, '_signupPage']);
Route::post('/signup', [UserController::class, '_signup'])->name('signup');
Route::get('/login', [UserController::class, '_loginPage'])->middleware('userLogin');
Route::post('/login', [UserController::class, '_login'])->name('login');
Route::get('/logout', [UserController::class, '_logout'])->name('logout');
Route::get('/usersList', [UserController::class, '_users']);
Route::get('/updateUser/{id?}',[UserController::class,'_updatePage'])->name('updateUser');
Route::post('/updateUser/{id?}',[UserController::class,'_update'])->name('updateUser');
Route::get('/deleteUser/{id?}', [UserController::class, '_delete'])->name('deleteUser');





Route::get('/adminHome', [AdminController::class, '_index']);
Route::get('/claimPage', [AdminController::class, '_claim']);
Route::get('/adminLogin', [AdminController::class, '_loginPage'])->middleware('adminLogin');
Route::get('/requestPage', [AdminController::class, '_request']);
Route::get('/adminSignup', [AdminController::class, '_signupAdmin'])->middleware('adminLogin');
Route::post('/adminSignup', [AdminController::class, '_signup'])->name('adminSignup');
Route::post('/adminLogin', [AdminController::class, '_login'])->middleware('adminLogin');
Route::get('/adminLogout', [AdminController::class, '_logout']);
Route::get('/adminsList', [AdminController::class, '_admins']);
Route::get('/deleteAdmin/{id?}', [AdminController::class, '_delete']);
Route::get('/updateAdmin/{id?}', [AdminController::class, '_updatePage'])->name('updateAdmin');
Route::post('/updateAdmin/{id?}', [AdminController::class, '_update'])->name('updateAdmin');
Route::post('/acceptRequest', [AdminController::class, '_acceptRequest'])->name('acceptRequest');
Route::get('/rejectRequest/{id?}', [AdminController::class, '_rejectRequest'])->name('rejectRequest');


Route::get('/superadminHome', [SuperAdminController::class, '_homeSuperadmin']);
Route::post('/superadminLogin', [SuperAdminController::class, '_login'])->name('superadminLogin');
Route::get('/superadminLogout', [SuperAdminController::class, '_logout']);
Route::get('/superadminLogin', [SuperAdminController::class, '_loginSuperadminPage']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/forgetpassword', [UserController::class, '_showForgotPasswordForm']);

Route::post('/forgetpassword', [UserController::class, '_sendResetLink'])->name('forgetPassword');

// Route::get('/resetpassword/{token}',[UserController::class,'_showResetForm']);

Route::get('/resetpassword/{token?}', [UserController::class, '_showResetForm'])->name('resetpassword');


Route::post('/resetpassword', [UserController::class, '_resetForm'])->name('resetpassword');





// Route::get('/transaction',function(){
//     return view('transaction.transaction');
// });



Route::fallback(function () {
    return view('error');
});