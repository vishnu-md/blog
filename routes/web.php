<?php

use App\Http\Controllers\OriBlogController;
 
Route::resource('oriblogs',OriBlogController::class);
Route::post('/create',[OriBlogController::class,'store']);
Route::post('/{id}/edit', 'OriBlogController@update');

