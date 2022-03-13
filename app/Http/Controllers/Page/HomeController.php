<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Services\ProductServiceInterface;
use App\Services\SlideServiceInterface;
use App\Services\TypeProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    protected $slideService;
    protected $typeProductService;

    public function __construct(
        ProductServiceInterface $productService,
        SlideServiceInterface $slideService,
        TypeProductServiceInterface $typeProductService
    ) {
        $this->productService = $productService;
        $this->slideService = $slideService;
        $this->typeProductService = $typeProductService;
    }

    public function index()
    {
        $product = $this->productService->GetListHighLightProduct();
        $slide = $this->slideService->GetSlidePublic();
        $menu = $this->typeProductService->GetTypeProduct();
        return view('page.index', compact(['product', 'slide', 'menu']));
    }
}
