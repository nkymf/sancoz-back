<?php

namespace App\Src\V1\Application\User\Delete;

use App\Src\V1\Domain\Repositories\UserRepository;

class DeleteHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(DeleteCommand $command): DeleteResponse
    {
        $user = $this->userRepository->find($command->getId());
        if (isset($user)) {
            $actionResponse = $this->userRepository->delete($user);
            return new DeleteResponse($actionResponse, $actionResponse ? 'user-deleted-successfully' : 'user-cannot-be-deleted');
        }
        return new DeleteResponse(false, trans('user-not-found'));
    }
}
