<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        return view('products.show', compact('product'));
    }

    public function create(){
        return view('products.create');
    }
}
