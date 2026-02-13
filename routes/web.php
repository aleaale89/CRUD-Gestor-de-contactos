<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/contacto', function () {
    return view('contacto.index');
});
*/
Route::get('contacto/create', [ContactoController::class, 'create']);

Route::resource('contacto', ContactoController::class);