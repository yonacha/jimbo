<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'max:10000000'],
            'short_description' => ['required', 'string', 'max:1000'],
            'description' => ['required', 'string', 'max:5000'],
            'image' => ['required', 'image'],
            'available' => ''
        ]);

        $imagePath = request('image')->store('uploads','public');

        if (isset($data['available']) && $data['available'] === "on") {
            $available = true;
        } else {
            $available = false;
        }

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'image' => $imagePath,
            'available' => $available
        ]);

        $flag = 'createdNewProduct';

        return view('products.create', compact('flag'));

    }

}
