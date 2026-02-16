<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// require __DIR__.'/auth.php'; right now we are using this require in api.php.
