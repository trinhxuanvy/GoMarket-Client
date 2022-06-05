<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{


    public function __construct() {}

    public function index() {
        return redirect('/admin/manage/store');
    }

    public function login() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = Http::post("http://localhost:3000/api/v1/Auth/login", ["email"=>$email, "password"=>$password]);

        if ($user->json()["status"] != 200) {
            return view("login", ["message"=>$user->json()["message"]]);
        }

        Cookie::queue('Bearer', $user->json()["bearerHeader"]);
        return redirect("/admin/manage/store");
    }

    public function register() {
        return view('register');
    }

    public function postRegister(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = Http::post("http://localhost:3000/api/v1/Auth/register", ["email"=>$email, "password"=>$password]);

        if ($user->json()["status"] != 200) {

            return view("register", ["message"=>$user->json()["message"]]);
        }

        return redirect("/auth/login");
    }

    public function logout(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/admin/logout");

        Cookie::forget('Bearer');
        return redirect("/auth/login");
    }
}
