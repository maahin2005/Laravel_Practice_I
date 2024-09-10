<?php

use App\Http\Controllers\DummyAPI;
use Illuminate\Support\Facades\Route;

Route::get('/dummy-data',[DummyAPI::class,"getDummyData"]);
