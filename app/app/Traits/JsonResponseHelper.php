<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonResponseHelper
{

    /**
     * Successful JSON Response
     *
     * @param mixed $data
     * @param int $code
     * @param string $message
     * @return JsonResponse
     */
    public static function success(mixed $data, int $code = Response::HTTP_OK, string $message = 'OK'): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'errors' => null,
            'message' => $message,
        ], $code);
    }

    /**
     * Error JSON Response
     *
     * @param array $errors
     * @param int $code
     * @param string $message
     * @return JsonResponse
     */
    public static function error(
        array  $errors = [],
        int    $code = Response::HTTP_BAD_REQUEST,
        string $message = 'Error has been occurred'
    ): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => null,
            'error' => $errors,
            'message' => $message
        ], $code);
    }
}
