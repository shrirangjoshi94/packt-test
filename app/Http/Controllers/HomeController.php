<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Get the home page with products list.
     *
     * @param Request $request
     * @param ProductService $productService
     * @return View
     */
    public function index(Request $request, ProductService $productService): View
    {
        $products = $productService->getProducts($request->all());
        $products = new LengthAwarePaginator(
            $products['products'],
            $products['total'],
            $products['per_page'],
            $products['current_page'],
            ['path' => Route::getFacadeRoot()->current()->uri()]
        );

        return view('home', ['products' => $products]);
    }
}
