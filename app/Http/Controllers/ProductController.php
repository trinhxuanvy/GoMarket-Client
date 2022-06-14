<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function __construct() {}

    public function index(Request $request) {
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

        $products = Http::get("http://localhost:3000/api/v1/product", $query);
        return view('store', ["products"=>$products->json()["product"]]);
    }

    public function detail(Request $request) {
        $productId = $request->id;
        $product = Http::get("http://localhost:3000/api/v1/product", ["id"=>$productId]);
        $products = Http::get("http://localhost:3000/api/v1/products");
        return view('product', ["product"=>$product->json(), "products"=>$products->json()["product"]]);
    }
}
