<?php

Route::middleware(['web'])->group(function ($router){

    Auth::routes(['verify' => true]);

});









