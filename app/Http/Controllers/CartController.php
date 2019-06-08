<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;

class CartController extends Controller
{
    public function create(Request $request, Cart $Cart)
    {
        $user_id = auth()->user()->id;
        $CartExists = $Cart->where("user_id", $user_id)->where("is_billing", false)->get();

        if (!collect($CartExists)->isEmpty()) {
            return response()->json(["success" => false, "message" => "Ya tiene un carrito creado"]);
        }
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->save();
        return response()->json(["success" => true, "data" => $cart]);
    }

    public function deleteAll(Request $request, Cart $Cart, CartItem $CartItem)
    {
        $user_id = auth()->user()->id;
        $CartExists = $Cart->where("user_id", $user_id)->where("is_billing", false)->first();
        $CartItem->where("cart_id", $CartExists->id)->delete();
        $Cart->where("user_id", $user_id)->where("is_billing", false)->delete();
        return response()->json(["success" => true]);
    }

    public function addCourse(Request $request, Cart $Cart, CartItem $CartItem)
    {
        $course_id  = request('course_id');
        $cart_id  = request('cart_id');
        $bodyContent = json_decode($request->getContent());
        $CartExists = $Cart->where("id", $cart_id)->where("is_billing", false)->get();
        if (collect($CartExists)->isEmpty()) {
            return response()->json(["success" => false, "message" => "El carrito no existe"]);
        }

        $CartItemExists = $CartItem->where("cart_id", $cart_id)->where("course_id", $course_id)->get();
        if (!collect($CartItemExists)->isEmpty()) {
            return response()->json(["success" => false, "message" => "Este curso ya esta agregado al carrito"]);
        }

        $cart_item = new CartItem();
        $cart_item->course_id = $course_id;
        $cart_item->cart_id = $cart_id;
        $cart_item->price = $bodyContent->price;
        $cart_item->save();
        return response()->json(["success" => true, "data" => $cart_item]);
    }

    public function deleteCourse(Request $request, CartItem $CartItem)
    {
        $course_id  = request('course_id');
        $cart_id  = request('cart_id');
        $CartItemExists = $CartItem->where("cart_id", $cart_id)->where("course_id", $course_id)->delete();
        return response()->json(["success" => true, "data" => $CartItemExists]);
    }

    public function getUserCart(Request $request, Cart $Cart)
    {
        // porcentaje info
        // descuentos
        // oferta info
        $user_id = auth()->user()->id;
        $Cart = $Cart->where("user_id", $user_id)->where("is_billing", false)->with("cart_items")->get();
        return response()->json(["success" => true, "data" => $Cart]);
    }
}
