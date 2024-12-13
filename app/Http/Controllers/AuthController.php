<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restoraunts;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function AuthUser(Request $request) {
        $isCredentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $isInputInfo = $request->only('name','password');

        $token = JWTAuth::attempt($isInputInfo);
        if(!$token) {
            return response()->json(['ошибка авторизации',404]);
        }
        
        return $this->respondWithToken($token);

    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function logout() {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
            'notify' => 'успешный выход'
        ]);
    }

    public function refershToken() {
        return $this->respondWithToken(JWTAuth::refresh());
    }

    public function RegistUser(Request $request) {        
        $isUserDB = User::where('name' , $request->input('name'))->first();
        $isAuthValidate = $request->validate([
            'name' => 'required|unique:users,name', 
            'password' => 'required|min:8',
        ]);

        if(!$isUserDB) {
            $user = User::create([
                'name' => $request->input("name"),
                'password' => bcrypt($request->input("password"))
            ]);
        } else {
            return back()->withErrors('такой пользователь уже сущетсвует');
        }

    }

}


//$isUserDB = User::all();
        //$isUser = User::where('name' , $request->input('AuthLogin'))->first();

        //if ($isUser && Hash::check($request->input('AuthPassword') , $isUser->password)) {
        //    Auth::login($isUser);
        //    return redirect('/')->with('success', 'успешный вход');
        //} else {
        //    return back()->withErrors('Неверные данные');
        //};
        
            //$isUserDB = new User();
            ///$isUserDB->name = $request->input('name');
            //$isUserDB->password = bcrypt($request->input('password'));
            //$isUserDB->save();
