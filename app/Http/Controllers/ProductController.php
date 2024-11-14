<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard/products/index')->with('products', $products);
    }

    public function create()
    {
        return view('dashboard/products/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'merk' => 'required',
            'description' => 'required',
            'price' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image' => 'required|image',
            'scent_similarities' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->merk = $request->merk;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->content = $request->content;
        $product->type = $request->type;
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->scent_similarities = $request->scent_similarities;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route("products.index")->with('success', 'Product succesvol aangemaakt!');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view("dashboard/products/show")->with('product', $product);
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("dashboard/products/edit")->with('product', $product);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'merk' => 'required',
            'description' => 'required',
            'price' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image' => 'nullable|image',
            'scent_similarities' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->merk = $request->merk;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->content = $request->content;
        $product->type = $request->type;
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->scent_similarities = $request->scent_similarities;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route("products.index")->with('success', 'Product succesvol aangepast!');
    }

    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route("products.index")->with('success', 'Product succesvol verwijderd!');
    }
}
