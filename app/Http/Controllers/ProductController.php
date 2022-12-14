<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * list of products
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $product = $this->productRepository->all();

        return response()->json($product);
    }
}
