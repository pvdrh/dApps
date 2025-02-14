<?php

namespace App\Traits;

use App\Http\Resources\ResponseJson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

trait HandleResponseApi
{
    /**
     * @param int $status
     * @param array $data
     * @return JsonResponse
     */
    public function responseSuccess($data = [], $statusCode = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'data' => $data,
        ];

        if (is_array($data) && Arr::exists($data, 'pagination')) {
            $response['pagination'] = $data['pagination'];
        }

        return $this->response($response, $statusCode);
    }

    /**
     * @param array $error
     * @param int $statusCode
     * @return JsonResponse
     */
    public function responseError(array $error = [], int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        if (empty($error)) {
            $error['code'] = $statusCode;
        }

        if (!isset($error['message'])) {
            $error['message'] = 'Error';
        }

        return $this->response($error, $statusCode);
    }

    /**
     * @param array $response
     * @param int $statusCode
     * @return JsonResponse
     */
    public function response($response, $statusCode): JsonResponse
    {
        return (new ResponseJson($response))
            ->response()
            ->setStatusCode($statusCode);
    }
}
