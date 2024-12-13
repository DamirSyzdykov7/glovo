<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\User;
use App\Models\dishes;
use App\Models\Restoraunts;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\URL;

class MainController extends Controller
{
    public function ShowMainPage() {
        $isRestoraunts = Restoraunts::all();

        return response()->json([
           'isRestoraunts' => $isRestoraunts,
        ]);
    }


    public function ShowDishesPage(Request $request) {
        $hadDishes = dishes::where('restoraunt_name' , $request->input("restorauntName"))->get();
        

        //return view('dishes', ['hadDishes' => $hadDishes, 'isUser' => $isUser, 'isCartDishes' => $isCartDishes]);
        return response()->json([
            'hadDishes' => $hadDishes,
         ]);
    }

    public function ActionDishesPage(Request $request) {
        $isUser = Auth::user()->id;

        $cart = new cart();
        $cart->name_of_dish = $request->input('dishName');
        $cart->price = $request->input('dishPrice');
        $cart->user()->associate($isUser);
        $cart->save();

        return back();
    }

    public function CartShow() {
            $isUser = Auth::user();
        $cartDishes = cart::where('user_id', $isUser->id)->get();
        return view('cart',  ['cartDishes' => $cartDishes, 'isUser' => $isUser]);
    }

    public function ProfileShow() {
        if(auth()->check()) {
            $authUserId = Auth::user()->id; 
        } else {
            $authUserId = null;
        }
            $validatedUser = User::where('id' , $authUserId)->first();
            return response()->json([
                'authUserId' => $authUserId,
                'validatedUser' => $validatedUser,
            ]);
    }
}

