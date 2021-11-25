<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class HomeControllerTest extends TestCase
{
    /**
     * Redirects to landing page test.
     *
     * @return void
     */
    public function testRedirectLandingPage(): void
    {
        $this->get('/')->assertRedirect('home');
    }

    /**
     * Landing page gets displayed test.
     *
     * @return void
     */
    public function testLandingPageIsDisplayed(): void
    {
        $this->get('home')->assertStatus(Response::HTTP_OK);
    }

    /**
     * Landing page does not get displayed when token is invalid test.
     *
     * @return void
     */
    public function testDisplayErrorWhenTokenIsInvalid(): void
    {
        Config::set('constants.api_token','invalid_token');
        $this->get('home')->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
