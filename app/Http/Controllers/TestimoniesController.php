<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonies;

class TestimoniesController extends Controller
{
    public function get(Testimonies $Testimonies)
    {
        return response()->json(["success" => true, "data" => $Testimonies->get()]);
    }
}
