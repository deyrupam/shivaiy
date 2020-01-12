<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products=product::all();
        return view('products/index',compact('products'));
    }
}
