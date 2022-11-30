<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class BaseApiController extends Controller
{
    public function sendError(
        string $message = 'failure',
        array $data = [],
        int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json(self::formatResponse($statusCode, $message, $data), $statusCode);
    }

    public function sendSuccess(
        string $message = 'success',
        array $data = [],
        int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return response()->json(self::formatResponse($statusCode, $message, $data), $statusCode);
    }

    public static function formatResponse(int $statusCode, string $message, array $data = []): array
    {
        return [
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];
    }
}
