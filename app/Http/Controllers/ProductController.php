<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Display product details.
     *
     * @param string $productId
     * @param ProductService $productService
     * @return View
     */
    public function show(string $productId, ProductService $productService): View
    {
        return view(
            'products.show',
            ['product' => $productService->getProductDetails($productId)]
        );
    }
}
