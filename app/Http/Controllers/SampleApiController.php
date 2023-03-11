<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Articles;
use App\Models\Product;
use Illuminate\Http\Request;

class SampleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        $response = ['code'=> 200, "message" => 'Successfully retrieved products!', 'products' => ProductResource::collection($products)];
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $product = Product::create($input);
        $response = ['code'=> 200, "message" => 'Product successfully created!', 'product' => new ProductResource($product)];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
        $response = ['code'=> 200, "message" => 'Successfully retrieved one product!', 'product' => new ProductResource($product)];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $product = Product::findOrFail($id);
        $product->update($input);
        $response = ['code'=> 200, "message" => 'Successfully updated!', 'product' => new ProductResource($product)];

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

         $response = ['code'=> 200, "message" => 'Successfully deleted!'];

        return $response;
    }
}
