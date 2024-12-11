<?php

use App\Http\Controllers\Admin\dashboardController;

Route::get('/dash', [dashboardController::class, 'index']);