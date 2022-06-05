<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class ManageStoreController extends Controller
{
    public function __construct() {}

    public function index() {
        //return redirect('/admin/manage/store');
    }

    public function profile(Request $request) {
        $storeId = $request->id;
        $bearer = Cookie::get('Bearer');
        $store = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/store/profile", ["id"=>$storeId]);

        if ($store->json()["status"] !== 200) {
            return redirect("/user/auth/login");
        }

        if (!isset($store->json()["data"]["store"])) {
            return view('manage-store', ["store"=>[]]);
        }

        return view('manage-store', ["store"=>$store->json()["data"]["store"]["entities"]]);
    }

    public function updateProfile(Request $request) {
        $storeId = $request->id;
        $bd = $request->all();
        $bearer = Cookie::get('Bearer');
        $store = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/store/profile/update", ["data"=>$bd, "id"=>$storeId]);

        if ($store["status"] !== 200) {
            return redirect("/user/auth/login");
        }

        return redirect("/store/manage/profile/".$storeId);
    }

    public function uploadImage(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/UploadFile", $request->all());
        return response()->json(array("msg"=>$url->json()), 200);
    }

    public function allStore(Request $request) {
        $bearer = Cookie::get('Bearer');

        $stores = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/page/manage-store/all-store");

        if (!isset($stores->json()["status"])) {
            return redirect("/user/auth/login");
        }

        if (!isset($stores->json()["data"]["stores"]["entities"])) {
            return redirect("/user/auth/login");
        }

        return view('manage-all-store', [
            "stores"=>$stores->json()["data"]["stores"]["entities"],
        ]);
    }

    public function addStore(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/Store", $request->all());
        return redirect("/store/manage/all-store");
    }
}