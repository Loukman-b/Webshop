<?php

namespace App\Http\Controllers;
use App\Models\Product; 

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function products(){
        $products = Product::all(); 
        return view('homepage')->with('products', $products);
    }
}
