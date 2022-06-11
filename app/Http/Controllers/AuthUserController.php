<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthUserController extends Controller
{


    public function __construct() {}

    public function index() {
        return redirect('/store/manage/all-store');
    }

    public function login() {
        return view('user-login');
    }

    public function postLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = Http::post("http://localhost:3000/api/v1/Auth/user/login", ["email"=>$email, "password"=>$password]);

        if ($user->json()["status"] != 200) {

            return view("user-login", ["message"=>$user->json()["message"]]);
        }

        Cookie::queue('Bearer', $user->json()["bearerHeader"], 60);
        return redirect("/store/manage/all-store");
    }

    public function register() {
        return view('user-register');
    }

    public function postRegister(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = Http::post("http://localhost:3000/api/v1/Auth/user/register", ["email"=>$email, "password"=>$password]);

        if ($user->json()["status"] != 200) {

            return view("user-register", ["message"=>$user->json()["message"]]);
        }

        return redirect("user/auth/login");
    }

    public function logout(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/user/logout");

        Cookie::forget('Bearer');
        return redirect("user/auth/login");
    }

    public function account(Request $request) {
        $bearer = Cookie::get('Bearer');
        $user = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/user/byId");

        if (isset($stores->json()["status"]) || $user["status"] !== 200) {
            return redirect("user/auth/login");
        }

        return view("user-account", ["user"=>$user["data"]["user"]]);
    }

    public function updateAccount(Request $request) {
        $bearer = Cookie::get('Bearer');
        $user = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/user/byId/update", [$request->all()]);

        if ($user["status"] !== 200) {
            return redirect("user/auth/login");
        }

        return redirect("/user/account");
    }
}