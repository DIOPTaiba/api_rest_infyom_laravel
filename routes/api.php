<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::resource('responsable_comptes', 'Responsable_compteAPIController');

Route::resource('clients', 'ClientsAPIController');

Route::resource('client_morals', 'Client_moralAPIController');

Route::resource('client_non_salaries', 'Client_non_salarieAPIController');

Route::resource('client_salaries', 'Client_salarieAPIController');

Route::resource('comptes', 'ComptesAPIController');

Route::resource('compte_bloques', 'Compte_bloqueAPIController');

Route::resource('compte_courants', 'Compte_courantAPIController');

Route::resource('compte_epargnes', 'Compte_epargneAPIController');

Route::resource('etat_comptes', 'Etat_compteAPIController');

Route::resource('operations', 'OperationsAPIController');