<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('products.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = '/uploads/images/products/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $postImage, ['disk' => 'public']);
            $product['image'] = $postImage;
        }

        Product::create($product);
        return redirect(route('products.index'))->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.form', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product):RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = '/uploads/images/products/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            Log::alert($postImage);
            $image->storeAs($destinationPath, $postImage, ['disk' => 'public']);
            $validated['image'] = $postImage;
        }

        $product->update($validated);
        return redirect(route('products.index'))->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Deleted successfully.');
    }
}
