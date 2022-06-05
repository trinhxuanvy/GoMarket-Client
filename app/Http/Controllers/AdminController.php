<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{


    public function __construct() {}

    public function index() {
        return redirect('/admin/manage/store');
    }

    public function storeList(Request $request) {
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

        $stores = Http::withHeaders(["authorization"=>$bearer])->get("http://localhost:3000/api/v1/store", $query);

        if (isset($stores->json()["status"])) {
            return redirect("/auth/login");
        }

        $pageNo = ceil($stores->json()["total"] / $paginationSize);

        for($i = $query["page"]; $i <= $pageNo; $i++) {
            $urlTemp = $request->create($url)->fullUrlWithQuery(["page"=>$i, "search"=>$request["search"]]);
            $pgItem = array("page"=>$i, "url"=>$urlTemp);
            array_push($paginationUrls, $pgItem);
        }

        $prevPage = $query["page"] > 1 ? $request->create($url)->fullUrlWithQuery(["page"=>$query["page"] - 1, "search"=>$request["search"]]) : "javascript:void(0)";
        $nextPage = $query["page"] < $pageNo ? $request->create($url)->fullUrlWithQuery(["page"=>$query["page"] + 1, "search"=>$request["search"]]) : "javascript:void(0)";

        return view('admin', [
            "stores"=>$stores->json()["store"],
            "pageNo"=>$pageNo,
            "currentPage"=>$query["page"],
            "paginationUrls"=>$paginationUrls,
            "prevPage"=>$prevPage,
            "nextPage"=>$nextPage
        ]);
    }

    public function verifyStore(Request $request) {
        $bearer = Cookie::get('Bearer');
        $stores = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/store/verify", ["id"=>$request->all()["id"]]);
        return response()->json(array("msg"=>$stores->json()), 200);
    }

    public function blockStore(Request $request) {
        $bearer = Cookie::get('Bearer');
        $stores = Http::withHeaders(["authorization"=>$bearer])->post("http://localhost:3000/api/v1/store/block", ["id"=>$request->all()["id"]]);
        return response()->json(array("msg"=>$stores->json()), 200);
    }
}
