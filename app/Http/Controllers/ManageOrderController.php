<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class ManageOrderController extends Controller
{
    public function __construct() {}

    public function index() {
        return redirect('/user/manage/all-store');
    }

    public function manageOrder(Request $request) {
        $bearer = Cookie::get('Bearer');

        $orders = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/page/manage-orders/".$request->id);

        if (!isset($orders->json()["status"]) || $orders->json()["status"] !== 200) {
            return redirect("/user/auth/login");
        }

        if (!isset($orders->json()["data"]["orders"]["entities"])) {
            return view('manage-order-store', [
                "orders"=>[],
            ]);
        }

        return view('manage-order-store', [
            "orders"=>$orders->json()["data"]["orders"]["entities"],
        ]);
    }

    public function manageOrderDetail(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/page/manage-orders/detail/".$request->id);
        return response()->json(array("msg"=>$url->json()), 200);
    }

}