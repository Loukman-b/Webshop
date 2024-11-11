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
        $this->validate ($request, [
            'name'=>'required',
            'merk'=>'required',
            'description'=>'required',
            'price'=>'required',
            'content'=>'required',
            'type'=>'required',
            'image'=>'required',
            'scent_similarities'=>'required',
            'stock'=>'required',
            'category_id'=>'required',
        ]);

        $products = new Product();
        $products->name = $request ->name;
        $products->merk = $request ->merk;
        $products->description = $request -> description;
        $products->price = $request-> price;
        $products->content = $request->content;
        $products->type = $request-> type;
        $products->image = $request-> image;
        $products->scent_similarities = $request->scent_similarities ;
        $products->category_id = $request->category_id; 
        $products->stock = $request->stock;
        $products->save();

        return redirect()->route("products.index")->with('success', 'Product succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::findOrFail($id);
        return view("dashboard/products/show") ->with('product', $products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $products = Product::findOrFail($id);
    return view("dashboard/products/edit")->with('product', $products);
}

       /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate ($request, [
            'name'=>'required',
            'merk'=>'required',
            'description'=>'required',
            'price'=>'required',
            'content'=>'required',
            'type'=>'required',
            'image'=>'required',
            'scent_similarities'=>'required',
            'stock'=>'required',
            'category_id'=>'required',
        ]);

        $products = Product::findOrFail($id);
        $products->name = $request ->name;
        $products->merk = $request ->merk;
        $products->description = $request -> description;
        $products->price = $request-> price;
        $products->content = $request->content;
        $products->type = $request-> type;
        $products->image = $request-> image;
        $products->scent_similarities = $request->scent_similarities ;
        $products->category_id = $request->category_id; 
        $products->stock = $request->stock;
        $products->save();

        return redirect()->route("products.index")->with('success', 'Product succesvol aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route("products.index")->with('success', 'Product succesvol verwijderd!');
    }
}
