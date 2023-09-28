<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/', function (){
    return view('/index');
});

Route::group(['prefix'=>'/customer'],function(){
    Route::get('/', [CustomerController::class, 'index']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::get('/view', [CustomerController::class, 'view']);
    Route::get('/trash', [CustomerController::class, 'trash']);
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/force-delete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.force-delete');
    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
});

Route::group(['prefix'=>'/update_customer'], function(){
    Route::post('/{id}', [CustomerController::class, 'update']);
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/edit/{id}', [CustomerController::class, 'update'])->name('customer.update');
});

Route::get('get-all-session', function(){
 $session = session()->all();
 p($session);
});

Route::get('set-session', function(Request $request){
    $request->session()->put('user_name', "session_testing");
    $request->session()->put('user_id',123);
    $request->session()->flash('status', 'success');
    return redirect('get-all-session');
});

Route::get('destroy-session', function() {
    session()->forget('user_name');
    session()->forget('user_id');
    return redirect('get-all-session');
});