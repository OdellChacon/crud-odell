<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(5);
        return view('product.index', $data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fields = [

            'Name_of_the_product'=>'required|string|max:100',
            'Trade_mark'=>'required|string|max:100',
            'Model'=>'required|string|max:100',
            'Provider'=>'required|string|max:100',
        ];

        $message = [

            'required'=>'The :attribute it´s required',
        ];

        $this->validate($request, $fields, $message);


        $productdata = request()->except('_token');
        Product::insert($productdata);
        /*return response()->json($productdata);*/
        return redirect('product')->with('Message','Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fields = [

            'Name_of_the_product'=>'required|string|max:100',
            'Trade_mark'=>'required|string|max:100',
            'Model'=>'required|string|max:100',
            'Provider'=>'required|string|max:100',
        ];

        $message = [

            'required'=>'The :attribute it´s required',
        ];

        $this->validate($request, $fields, $message);


        $productdata = request()->except(['_token','_method']);
        Product::where('id','=',$id)->update($productdata);
        $product = Product::findOrFail($id);
        //return view('product.edit', compact('product'));
        return redirect('product')->with('Message','Product updated successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product')->with('Message','Product eliminated successfully!'); 
    }
}
