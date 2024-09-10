<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrRoutingController extends Controller
{
    function getListHrs (){
        return response()->json(["hrList"=>"1234"]);
    }
}
