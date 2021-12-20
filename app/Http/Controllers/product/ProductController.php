<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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


    public function store(ProductRequest $request)
    {
        $input = $request->all();

        if ($image = $request->file('urlImage')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['urlImage'] = "$profileImage";
        }

        Product::create($input);
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


    public function update(ProductRequest $request,Product $product)
    {
        $input = $request->all();

        if ($image = $request->file('urlImage')) {
            //url de destino
            $destinationPath = 'image/';
            //le asigna al archivo como nombre la fecha y su extencion original
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //mueve el archivo a la carpeta destino
            $image->move($destinationPath, $profileImage);
            //le asigna a el campo la url modificada
            $input['urlImage'] = "$profileImage";
        }else{
            //no setea campo
            unset($input['urlImage']);
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
        $product->delete();
        return redirect('products');
    }
}
