<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;

class InterestController extends Controller
{
    public function show(Interest $Interest)
    {
        return response()->json($Interest->get());
    }
}
