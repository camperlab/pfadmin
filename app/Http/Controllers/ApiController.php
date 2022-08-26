<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    /**
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return JsonResponse
     */
    protected function respond($data, int $statusCode = 200, array $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }

    /**
     * @return JsonResponse
     */
    protected function respondSuccess()
    {
        return $this->respond(null);
    }

    /**
     * Respond with no content.
     * @return JsonResponse
     */
    protected function respondNoContent()
    {
        return $this->respond(null, 204);
    }

    /**
     * Respond with error.
     * @param $message
     * @param $statusCode
     * @return JsonResponse
     */
    protected function respondError($message, $statusCode)
    {
        return $this->respond([
            'errors' => [
                'message' => $message,
                'status_code' => $statusCode
            ]
        ], $statusCode);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    protected function respondNotFound(string $message = 'Not Found')
    {
        return $this->respondError($message, 404);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    protected function respondCreated($data)
    {
        return $this->respond($data, 201);
    }
}
