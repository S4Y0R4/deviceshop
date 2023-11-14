<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\PriceChange;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():AnonymousResourceCollection
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request):ProductResource
    {
        $product = Product::create($request->except('price'));

        $priceChange = new PriceChange([
            'product_id' => $product->id,
            'new_price' => $request->price,
            'date_price_change' => now(),
        ]);
        $product->priceChanges()->save($priceChange);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id):ProductResource
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product):ProductResource
    {
        if ($request->input('price') != null) {
            $priceChange = new PriceChange([
                'new_price' => $request->input('price'),
                'date_price_change' => now(),
            ]);
            $product->priceChanges()->save($priceChange);
        }
        $product->update($request->except('price'));
        return new ProductResource($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product):Response
    {
        $product->delete();
        return response()->noContent();
    }
}
