<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\ApiHelper;
use Illuminate\Support\Arr;

class ProductService
{
    /**
     * Get list of products.
     *
     * @param array $data
     * @return array
     */
    public function getProducts(array $data): array
    {
        $data = Arr::only($data, ['page']);
        $data['limit'] = config('constants.products.products_per_page');
        $products = ApiHelper::get(config('api_constants.get_products'), $data);

        return $products;
    }

    /**
     * Get product details.
     *
     * @param string $productId
     * @return array
     */
    public function getProductDetails(string $productId): array
    {
        $url = str_replace('{product_id}', $productId, config('api_constants.get_product_details'));
        $product = ApiHelper::get($url);
        $this->getProductPrice($product);
        $this->getProductImage($product);

        return $product;
    }

    /**
     * Get product prices.
     *
     * @param array $product
     * @return void
     */
    private function getProductPrice(array &$product): void
    {
        $url = str_replace('{product_id}', $product['id'], config('api_constants.get_product_price'));
        $url = str_replace('{code}', config('constants.products.product_price_code'), $url);
        $prices = ApiHelper::get($url);
        $product['prices'] = $prices['prices'];
    }

    /**
     * Get product cover image.
     *
     * @param array $product
     * @return void
     */
    private function getProductImage(array &$product): void
    {
        if (empty($product['images'])) {
            return;
        }

        $url = str_replace('{product_id}', $product['id'], config('api_constants.get_product_image'));
        $response = ApiHelper::get($url, [], false);
        $product['cover'] = base64_encode($response);
    }
}
