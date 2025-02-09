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
use App\Models\Thread;

class MainController extends Controller
{

    protected $user;

    public function infoUSer($user) { 
        $this->$user = $user;
    }

    public function AddThread(Request $request) {
        $user =  session('username'); 

        $getInfo = $request->input('title');

        if (session()->has('username')) {
            echo "Пользователь: " . session('username');
        } else {
            echo "Нет данных в сессии.";
        }
        
        if(isset($getInfo) && !empty($getInfo)) {

            Thread::create([
                'user' => isset($user) ? $user : 'гость' ,
                'name_Thread' => $request->input('title'),
                'Info' => $request->input('content'),
                
            ]);
        } else {
            echo 'данные не пришли';
        }

        return response()->json([
            'info' => $getInfo
        ]);
    }

    public function showThread() {
        if(isset($_SESSION['username'])) {
            $userName = session('username');
        } else {
            $userName = null;
        }
        $data = Thread::all();

        return response()->json([
            'user' => $userName,
            'thread' => $data
        ]);
    }

}

