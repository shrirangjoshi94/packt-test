<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class ProductControllerTest extends TestCase
{
    /**
     * Product details are displayed test.
     *
     * @return void
     */
    public function testProductDetailsAreDisplayed(): void
    {
        $this->get('products/' . env('TEST_RECORD_ID'))->assertStatus(Response::HTTP_OK);
    }

    /**
     * Invalid product ID shows error page test.
     *
     * @return void
     */
    public function testInvalidProductIdErrorPageDisplayed(): void
    {
        $this->get('products/invalid_id')->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
     * Display error when API token is invalid test.
     *
     * @return void
     */
    public function testDisplayErrorWhenTokenIsInvalid(): void
    {
        Config::set('constants.api_token','invalid_token');
        $this->get('products/' . env('TEST_RECORD_ID'))->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
