<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Function to create product instance from a custom request that does all validation checks
     * Returns the product it just received
     *
     * @param ProductCreateRequest $request
     * @return ProductResource
     */
    public function create(ProductCreateRequest $request)
    {
        $product = Product::create([
            'sku' => $request->input('sku'),
            'attributes' => json_encode($request->input('attributes')),
        ]);

//        $attributes = $request->input('attributes');
//
//        $attribute = Attribute::create([
//            'size' => $attributes['size'],
//            'grams' => $attributes['grams'],
//            'foo' => $attributes['foo'],
//            'product_id' => $product->id,
//        ]);

        return ProductResource::make($product);
    }

    /**
     * Function to list all products in the database in array form
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list()
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

}
