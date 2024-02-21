<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\Store as StoreRequest;
use App\Http\Requests\Products\Update as UpdateRequest;
use App\Jobs\SendMailAddItem;
use App\Models\Product;
use Illuminate\Http\Request;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $storeRequest)
    {
        $product = Product::make($storeRequest->validated());
        SendMailAddItem::dispatch(config('products.email'), 'Новый продукт' . PHP_EOL . ' ' . implode(",", $product->toArray()));

        $product->save();
        return redirect()->route('products.index')->with('alert', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $result = $product->toArray();
        $result['status'] = $product->status->text();

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $html = view('products.edit', compact('product'))->render();

        return $html;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')->with('alert', 'успешно изменено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
