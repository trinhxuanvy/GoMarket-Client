<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class UploadFileController extends Controller
{
    public function __construct() {}

    public function uploadImage(Request $request) {
        $bearer = Cookie::get('Bearer');
        $url = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/UploadFile", $request->all());
        return response()->json(array("msg"=>$url->json()), 200);
    }
}
