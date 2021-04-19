<?php

use Tareghnazari\Dashboard\Http\Controllers\DashboardController;

Route::group(['namespace' => 'Tareghnazari\Dashboard\Http\Controllers','middleware' => ['web' , 'auth' , 'verified']],function ($router) {
    $router->get('/home', [DashboardController::class, 'home'])->name('homes');
});

