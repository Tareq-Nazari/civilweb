<?php

Route::group(['middleware' => ['web' , 'auth' , 'verified']],function ($router){

    $router->resource('category',\Tareghnazari\Category\Http\Controllers\CategoryController::class);

});
