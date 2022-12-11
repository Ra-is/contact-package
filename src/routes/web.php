<?php

use Illuminate\Http\Request;
;

Route::group(['namespace' => 'Rais\Contact\Http\Controllers'], function()
{
    Route::get('contact',[Rais\Contact\Http\Controllers\ContactController::class,'index'])->name('contact');

    Route::post('contact',[Rais\Contact\Http\Controllers\ContactController::class,'send']);
});





