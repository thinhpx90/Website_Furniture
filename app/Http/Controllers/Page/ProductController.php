<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Services\ProductServiceInterface;
use App\Services\TypeProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $typeProductService;

    public function __construct(
        ProductServiceInterface $productService,
        TypeProductServiceInterface $typeProductService

    ) {
        $this->productService = $productService;
        $this->typeProductService = $typeProductService;
    }

    public function GetDetailAjax($id)
    {
        $data = $this->productService->GetDetail($id);
        return response()->json($data);
    }

    public function GetDetailProduct($slug)
    {
        $product = $this->productService->GetBySlug($slug);
        return view('page.product', compact('product'));
    }

    public function GetProducts(Request $request)
    {
        $product = $this->productService->GetListProduct($request->all());
        $menu = $this->typeProductService->GetTypeProduct();
        return view('page.product_grid', compact(['product', 'menu']));
    }
}
