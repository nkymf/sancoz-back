<?php

namespace App\Src\Shared\Infrastructure\ValueObject;

use Illuminate\Http\JsonResponse;

class JsonApiResponse
{
    private $message;
    private $status;
    private $data;

    public function __construct(bool $status ,string $message = '', $data = null)
    {
        $this->message = $message;
        $this->data = $data;
        $this->status = $status;
    }

    public function sendResponse(): JsonResponse
    {
        return response()->json([
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ]);
    }
}
