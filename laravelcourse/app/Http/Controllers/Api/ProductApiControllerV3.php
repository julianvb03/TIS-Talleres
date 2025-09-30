<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Http\Requests\ApiSupplementFilter;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {

        $products = new ProductCollection(Product::all());

        return response()->json($products, 200);

    }

    public function paginate(): JsonResponse
    {

        $products = new ProductCollection(Product::paginate(5));

        return response()->json($products, 200);

    }

    public function filter(ApiSupplementFilter $request): JsonResponse
    {
        $products = Product::filter(
            $request->input('search'),
            $request->input('min_price'),
            $request->input('max_price')
        );
        
        $paginatedProducts = new ProductCollection($products->paginate(5));

        return response()->json($paginatedProducts, 200);

    }
}
