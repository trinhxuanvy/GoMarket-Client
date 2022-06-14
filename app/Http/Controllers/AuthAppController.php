<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthAppController extends Controller
{


    public function __construct() {}

    public function index() {
        return redirect('/store');
    }

    public function login() {
        $user = Cookie::get('User');
        if($user)
        {
            $cart = json_decode($user,TRUE)["cart"];
        }
        else
        {
            $cart = null;
        }
        return view('app-login', ["cart"=>$cart, "user"=>$user]);
    }

    public function postLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $data = Http::post("http://localhost:3000/api/v1/Auth/user/login", ["email"=>$email, "password"=>$password]);
        

        if ($data->json()["status"] != 200) {
            $cart = null;
            $user = null;
            return view("app-login", ["message"=>$data->json()["message"], "cart"=>$cart, "user"=>$user]);
        }
        Cookie::queue('Bearer', $data->json()["bearerHeader"], 60);
        Cookie::queue('User', $data->json()["user"], 60);
        // if ($user->json()["user"] != null) {

        //     Cookie::queue('User', $user->json()["user"], 60);
        // }
        return redirect("/store");
    }

    public function register() {
        return view('app-register');
    }

    public function postRegister(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = Http::post("http://localhost:3000/api/v1/Auth/user/register", ["email"=>$email, "password"=>$password]);

        if ($user->json()["status"] != 200) {

            return view("app-register", ["message"=>$user->json()["message"]]);
        }

        return redirect("app/auth/login");
    }

    public function logout(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/user/logout");

        Cookie::forget('Bearer');
        return redirect("app/auth/login");
    }
}