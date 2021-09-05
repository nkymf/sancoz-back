<?php

namespace App\Src\V1\Infrastructure\Controllers;

use App\Src\Shared\Infrastructure\ValueObject\JsonApiResponse;
use App\Src\V1\Application\User\Read\ReadCommand;
use App\Src\V1\Application\User\Read\ReadHandler;
use Illuminate\Http\JsonResponse;

class ReadUserController
{
    public function handle(ReadHandler $handler): JsonResponse
    {
        $response = $handler->handle(new ReadCommand());
        $response = new JsonApiResponse($response->getStatus(), $response->getMessage(), $response->getData());
        return $response->sendResponse();
    }
}
