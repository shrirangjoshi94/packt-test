<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ApiHelper
{
    /**
     * Call GET method APIs.
     *
     * @param string $url
     * @param array $data
     * @param bool $decodeResponse
     * @return array|string
     */
    public static function get(string $url, array $data = [], bool $decodeResponse = true)
    {
        $response = Http::accept('application/json')
            ->withToken(config('constants.api_token'))
            ->get(env('API_URL') . $url, $data);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            abort($response->getStatusCode());
        }

        if (!$decodeResponse) {
            return $response->body();
        }

        return json_decode($response->body(), true);
    }
}
