<?php

namespace App\Src\V1\Infrastructure\Controllers;

use App\Src\Shared\Infrastructure\ValueObject\JsonApiResponse;
use App\Src\V1\Application\User\Delete\DeleteCommand;
use App\Src\V1\Application\User\Delete\DeleteHandler;
use App\Src\V1\Domain\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteUserController
{
    public function handle(Request $request, DeleteHandler $handler): JsonResponse
    {
        $error = $this->validateDeletion($request);

        if (isset($error)) {
            $response = new JsonApiResponse(false, $error);
            return $response->sendResponse();
        }

        $response = $handler->handle(new DeleteCommand(
            $request->get(User::PARAM_ID)
        ));

        $response = new JsonApiResponse($response->getStatus(), $response->getMessage(), $response->getData());
        return $response->sendResponse();

    }

    private function validateDeletion(Request $request): ?string
    {
        {
            $requestParams = array_keys($request->all());
            foreach (User::getParamsForDeletion() as $param) {
                if (!in_array($param, $requestParams)) {
                    return trans('api.parameters-' . $param . '-not-found');
                }
            }
            return null;
        }
    }
}

