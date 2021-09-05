<?php

namespace App\Src\V1\Infrastructure\Controllers;

use App\Src\Shared\Infrastructure\ValueObject\JsonApiResponse;
use App\Src\V1\Application\User\Create\CreateCommand;
use App\Src\V1\Application\User\Create\CreateHandler;
use App\Src\V1\Domain\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateUserController
{
    public function handle(Request $request, CreateHandler $handler): JsonResponse
    {
        $error = $this->validateCreation($request);

        if (isset($error)) {
            $response = new JsonApiResponse(false, $error);
            return $response->sendResponse();
        }

        $response = $handler->handle(new CreateCommand(
            $request->get(User::PARAM_NAME),
            $request->get(User::PARAM_PHONE),
            $request->get(User::PARAM_EMAIL),
            $request->get(User::PARAM_BIRTH_DATE),
            $request->get(User::PARAM_CIVIL_STATE)
        ));

        $response = new JsonApiResponse($response->getStatus(), $response->getMessage(), $response->getData());
        return $response->sendResponse();
    }

    private function validateCreation(Request $request): ?string
    {
        {
            $requestParams = array_keys($request->all());
            foreach (User::getParamsForCreation() as $param) {
                if (!in_array($param, $requestParams)) {
                    return trans('api.parameters-' . $param . '-not-found');
                }
            }
            return null;
        }
    }
}
