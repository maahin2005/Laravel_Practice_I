<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyAPI extends Controller
{
    public function getDummyData()
    {
        return response()->json([
            'message' => 'This is dummy data!',
        ]);
    }
}
