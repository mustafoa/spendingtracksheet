<?php

use App\Http\Controllers\DebtController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TradeController;
use Illuminate\Support\Facades\Route;

// AUTH
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('/', 'login')->name('login');
Route::get('index', [TradeController::class, 'index'])->name('index')->middleware('auth');
Route::post('store', [TradeController::class, 'store'])->middleware('auth');
Route::delete('TradeDestroy/{id}', [TradeController::class, 'destroy'])->name('TradeDestroy')->middleware('auth');
Route::get('TradeEdit/{id}', [TradeController::class, 'edit'])->name('TradeEdit')->middleware('auth');
Route::get('TradeShow/{id}', [TradeController::class, 'show'])->name('TradeShow')->middleware('auth');
Route::post('TradeUpdate/{id}', [TradeController::class, 'update'])->name('TradeUpdate')->middleware('auth');

// Debt
Route::get('/qarz', [DebtController::class, 'menu'])->name('qarz')->middleware('auth');
Route::get('/dbShow/{id}', [DebtController::class, 'dbShow'])->name('dbShow')->middleware('auth');
Route::post('DebtMenuAdd', [DebtController::class, 'MenuAdd'])->name('DebtMenuAdd')->middleware('auth');
Route::post('DayDebtAdd', [DebtController::class, 'addDebt'])->name('DayDebtAdd')->middleware('auth');
Route::get('/DayDbShow/{id}', [DebtController::class, 'DayDbShow'])->name('DayDbShow')->middleware('auth');
Route::delete('/DebtDestroy/{id}', [DebtController::class, 'destroy'])->name('DebtDestroy')->middleware('auth');
Route::delete('/DebtMenuDestroy/{id}', [DebtController::class, 'menuDBDelete'])->name('DebtMenuDestroy')->middleware('auth');
Route::get('DebtEdit/{id}', [DebtController::class, 'edit'])->name('DebtEdit')->middleware('auth');
Route::post('DebtUpdate/{id}', [DebtController::class, 'update'])->name('DebtUpdate')->middleware('auth');

// Employee
Route::post('EmployeemenuAdd', [EmployeeController::class, 'menuAdd'])->name('menuAdd')->middleware('auth');
Route::post('addEmployee', [EmployeeController::class, 'addEmployee'])->name('addEmployee')->middleware('auth');
Route::get('/employeeShow/{id}', [EmployeeController::class, 'employeeShow'])->name('employeeShow')->middleware('auth');
Route::get('/DayEmployeeShow/{id}', [EmployeeController::class, 'DayEmployeeShow'])->name('DayEmployeeShow')->middleware('auth');
Route::delete('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('destroy')->middleware('auth');
Route::delete('employeeMenDestroy/{id}', [EmployeeController::class, 'employeeMenDestroy'])->name('employeeMenDestroy')->middleware('auth');
Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('DayEmployeeEdit')->middleware('auth');
Route::get('DayEmployeeShow/{id}', [EmployeeController::class, 'DayEmployeeShow'])->name('DayEmployeeShow')->middleware('auth');
Route::post('DayEmployeeUpdate/{id}', [EmployeeController::class, 'update'])->name('EmployeeUpdate')->middleware('auth');

Route::get('/xodim', [EmployeeController::class, 'menu'])->name('xodim')->middleware('auth');

