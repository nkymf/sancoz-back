<?php

namespace App\Src\V1\Application\User\Create;

use App\Src\V1\Domain\Repositories\UserRepository;

class CreateHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateCommand $command): CreateResponse
    {
        $user = $this->userRepository->checkIfUserExists($command->getEmail());
        if ($user == null) {
            $user = $this->userRepository->create($command->getEmail(), $command->getBirthDate(), $command->getCivilState(), $command->getName(), $command->getPhone());
            if (isset($user)) {
                return new CreateResponse(true, trans('user-created-successfully'));
            }
            return new CreateResponse(false, 'error-creating-user');
        }

        return new CreateResponse(false, trans('user-already-exists'));
    }
}
