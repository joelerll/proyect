<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhyUse;

class WhyUseController extends Controller
{
    public function get(WhyUse $WhyUse)
    {
        return response()->json(["success" => true, "data" => $WhyUse->get()]);
    }
}
