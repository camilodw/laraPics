<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeProductRequest;
use App\Http\Requests\Product\updateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(6);
        return view ('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }


    public function store(storeProductRequest $request)
    {

        $product = $request->all();
        if ($image = $request->file('urlImage')) {
            $product['urlImage']= $request->file('urlImage')->store('uploads','public');
        }
        Product::create($product);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       return view('product.edit',compact('product'));
    }


    public function update(updateProductRequest $request,Product $product)
    {
        $input = $request->all();

        if ($image = $request->file('urlImage')) {
            //elimino imagen anterior

            Storage::delete('public/'.$product->urlImage);
            $input['urlImage']= $request->file('urlImage')->store('uploads','public');
        }

        $product->update($input);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete('public/'.$product->urlImage);
        $product->delete();
        return redirect('products');
    }
}
