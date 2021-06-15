<?php
Route::group(['middleware' => 'web'],function ($router){
    $router->resource('settlements',\Tareghnazari\Payment\Http\Controllers\SettlementController::class);
    $router->post('settlements/accept',[\Tareghnazari\Payment\Http\Controllers\SettlementController::class,'accept']);
});

