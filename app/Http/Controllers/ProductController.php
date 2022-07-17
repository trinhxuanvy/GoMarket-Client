<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

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
        $bearer = Cookie::get('Bearer');
        $user = Cookie::get('User');
        $user = Cookie::get('User');
        $cartCount = 0;
        if(isset($user))
        {
            $cart = json_decode($user,TRUE)["cart"];
            $cartStore = json_decode($user,TRUE)["cartStore"];
            if(isset($cart))
            {
                foreach ($cart as $cartDetail) {
                    $item = json_decode(json_encode($cartDetail),TRUE);
                    $cartCount += $item['amount'];
                }
            }
        }
        else{
            $cart = null;
            $cartStore = null;
        }
        $productId = $request->id;
        $product = Http::get("http://localhost:3000/api/v1/product", ["id"=>$productId]);
        $products = Http::get("http://localhost:3000/api/v1/products");
        return view('product', ["user"=>$user, "product"=>$product->json(), "products"=>$products->json()["product"],"cart"=>$cart, "cartCount"=>$cartCount, "cartStore"=>$cartStore]);
    }
}
