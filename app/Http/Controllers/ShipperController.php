<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class ShipperController extends Controller
{
    public function __construct() {}

    public function index() {
        return redirect('/shipper/manage');
    }

    public function allOrderReceive(Request $request) {
        $bearer = Cookie::get('Bearer');

        $paginationSize = 2;
        $query = array("page"=>1, "search"=>"");
        $paginationUrls = array();
        $url = $request->url();

        if (isset($request->search)) {
            $query["search"] = $request->search;
        }

        if (isset($request->page)) {
            $query["page"] = $request->page;
        }

        $orders = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/shipper/order", $query);

        // if (!isset($orders->json()["status"])) {
        //     return redirect("/shipper/auth/login");
        // }

        // if (!isset($orders->json()["data"]["orders"]["entities"])) {
        //     return redirect("/shipper/auth/login");
        // }

        return view('manage-order-shipper', [
            "stores"=>$orders->json()["data"]["orders"]["entities"],
        ]);
    }
}
