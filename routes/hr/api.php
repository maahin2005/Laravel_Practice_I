<?php

use App\Http\Controllers\HrRoutingController;
use Illuminate\Support\Facades\Route;

Route::get('hr-list',[HrRoutingController::class,"getListHrs"]);
