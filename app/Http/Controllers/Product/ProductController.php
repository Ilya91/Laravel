<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class ProductController extends ApiController
{

    public function __construct()
    {
        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::all();

        return $this->showAll($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return $this->showOne($product);
    }
}
