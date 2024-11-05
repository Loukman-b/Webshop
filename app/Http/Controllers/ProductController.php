<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view ('dashboard/products/index')-> with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard/products/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->vaildate ($request, [
            'name'=>'required',
            'merk'=>'required',
            'description'=>'required',
            'price'=>'required',
            'content'=>'required',
            'type'=>'required',
            'image'=>'required',
            'scent_similarities'=>'required',
            'stock'=>'required',
        ]);

        $product = new Product();
        $product->name = $request ->name;
        $product->merk = $request ->merk;
        $product->description = $request -> description;
        $product->price = $request-> price;
        $product->content = $request->content;
        $product-> type = $request-> type;
        $product-> image = $request-> image;
        $product-> scent_smilarities = $request->scent_smilarities ;
        $product-> stock= $request-> stock;
        $product->save();

        return redirect()->route("products.index")->with('success', 'Product succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrfail($id);
        return view("dashboard/products/show") ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("dashboard/products/edit")->with('product', $product);
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
