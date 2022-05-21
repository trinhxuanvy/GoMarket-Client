<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function __construct() {}

    public function index() {
        $stores = Http::get("https://mocki.io/v1/759e4813-4af0-45ad-8d95-a9a28abae7ab");
        return view('admin', ["stores"=>$stores->json()]);
    }
}