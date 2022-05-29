<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ManageStoreController extends Controller
{
    public function __construct() {}

    public function index() {
        //return redirect('/admin/manage/store');
    }

    public function profile() {
        $id = "628856a06466de76b01c17a6";
        $store = Http::get("http://localhost:3000/api/v1/store/".$id);
        return view('manage-store', ["store"=>$store->json()]);
    }

    public function updateProfile(Request $request) {
        $id = "628856a06466de76b01c17a6";
        $body = array(
            "storeName"=>"",
            "ward"=>"",
            "district"=>"",
            "province"=>"",
            "address"=>"",
            "tax"=>"",
            "cerification"=>"",
            "businessLicense"=>"");
        $bd = $request->all();
        $bd["_id"] = $id;
        $store = Http::put("http://localhost:3000/api/v1/store", $bd);
        return redirect("/store/manage/profile");
    }

    public function uploadImage(Request $request) {
            // $path = Storage::path($_FILES["image"]["name"]);
            $url = Http::post("http://localhost:3000/api/v1/UploadFile", $request->all());
            //$file->move("http://localhost:3000/api/v1/UploadFile", $file->getClientOriginalName());

            return response()->json(array("msg"=>$url->json()), 200);

    }
}
