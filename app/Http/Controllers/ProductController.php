<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
        ]);

        $product = Product::create($request->all());

        return redirect()->route('products.show', $product);
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
        ]);

        $product->update($request->all());

        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
