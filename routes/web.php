<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CarrierController;




Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/admin-home', function () {
     return view('admin-side.admin-home');
 });

//Banks Routes..
Route::get('all-bank',[AdminController::class, 'index']);
Route::get('show-bank',[AdminController::class, 'showBank']);
Route::get('add-bank',[AdminController::class, 'addBank']);
Route::post('store-bank',[AdminController::class, 'storeBank']);
Route::get('edit-bank',[AdminController::class, 'EditBank']);
Route::post('update-bank',[AdminController::class, 'UpdateBank']);
Route::get('delete-bank',[AdminController::class, 'deleteeBank']);


//Party Routes..
Route::get('all-party',[PartyController::class, 'index']);
Route::get('show-party',[PartyController::class, 'showParty']);
Route::get('add-party',[PartyController::class, 'addParty']);
Route::post('store-party',[PartyController::class, 'storeParty']);
Route::get('edit-party',[PartyController::class, 'editParty']);
Route::post('update-party',[PartyController::class, 'updateParty']);
Route::get('delete-party',[PartyController::class, 'deleteParty']);

//Passenger Routes..
Route::get('all-passenger',[PassengerController::class, 'index']);
Route::get('show-passenger',[PassengerController::class, 'showPassenger']);
Route::get('add-passenger',[PassengerController::class, 'addPassenger']);
Route::post('store-passenger',[PassengerController::class, 'storePassenger']);
Route::get('edit-passenger',[PassengerController::class, 'editPassenger']);
Route::post('update-passenger',[PassengerController::class, 'updatePassenger']);

//Airlines Routes..
Route::get('all-airline',[AirlineController::class, 'index']);
Route::get('show-airline',[AirlineController::class, 'showAirline']);
Route::get('add-airline',[AirlineController::class, 'addAirline']);
Route::post('store-airline',[AirlineController::class, 'storeAirline']);
Route::get('edit-airline',[AirlineController::class, 'editAirline']);
Route::post('update-airline',[AirlineController::class, 'updateAirline']);
Route::get('delete-airline',[AirlineController::class, 'deleteAirline']);

//Airport Routes..
Route::get('all-airport',[AirportController::class, 'index']);
Route::get('show-airport',[AirportController::class, 'showAirport']);
Route::get('add-airport',[AirportController::class, 'addAirport']);
Route::post('store-airport',[AirportController::class, 'storeAirport']);
Route::get('edit-airport',[AirportController::class, 'editAirport']);
Route::post('update-airport',[AirportController::class, 'updateAirport']);
Route::get('delete-airport',[AirportController::class, 'deleteAirport']);

//Bank Transaction Routes..
Route::get('all-Transaction',[TransactionController::class, 'index']);
Route::get('show-Transaction',[TransactionController::class, 'showTransection']);
Route::get('add-Transaction',[TransactionController::class, 'addTransection']);
Route::post('store-Transaction',[TransactionController::class, 'storeTransection']);
Route::get('edit-Transaction',[TransactionController::class, 'editTransection']);
Route::post('update-Transaction',[TransactionController::class, 'updateTransection']);
Route::get('delete-Transaction',[TransactionController::class, 'deleteTransection']);

//Carriers Routes..
Route::get('all-carier',[CarrierController::class, 'index']);
Route::get('show-carier',[CarrierController::class, 'showCarier']);
Route::get('add-carier',[CarrierController::class, 'addCarier']);
Route::post('store-carier',[CarrierController::class, 'storeCarier']);
Route::get('edit-carier',[CarrierController::class, 'editCarier']);
Route::post('update-carier',[CarrierController::class, 'updateCarier']);
Route::get('delete-carier',[CarrierController::class, 'deleteCarier']);



Route::group(['middleware' => 'admin'], function (){
    
    

    
 Route::get('/', function () {
     return view('admin-side.admin-home');
 });
    
    
    
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

