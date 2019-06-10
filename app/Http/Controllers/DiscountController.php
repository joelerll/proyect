<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\CourseDiscount;
use App\User;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['create']]);
    }

    public function create(Request $request, User $User, Discount $Discount)
    {
        $valid_user_type = 3;
        $user_type = auth()->user()->user_type_id;
        if ($user_type != $valid_user_type) {
            return response()->json(["message" => "No tiene permitido", "success" => false]);
        }

        $bodyContent = json_decode($request->getContent());
        $discount = new Discount();
        $discount->limit = $bodyContent->limit;
        $discount->save();
        return response()->json(["success" => true, "data" => $discount]);
    }

    public function add_course(Request $request, User $User, CourseDiscount $CourseDiscount) {
        $valid_user_type = 3;
        $user_type = auth()->user()->user_type_id;
        if ($user_type != $valid_user_type) {
            return response()->json(["message" => "No tiene permitido", "success" => false]);
        }
        $course_id  = request('course_id');
        $discount_id  = request('discount_id');
        $bodyContent = json_decode($request->getContent());
        $course_discount = new CourseDiscount();
        $course_discount->discount_id = $discount_id;
        $course_discount->course_id = $course_id;
        $course_discount->percentage = $bodyContent->percentage;
        $course_discount->save();
        return response()->json(["success" => true, "data" => $course_discount]);
    }
}
