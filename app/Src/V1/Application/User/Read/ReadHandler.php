<?php

namespace App\Src\V1\Application\User\Read;

use App\Src\V1\Domain\Repositories\UserRepository;

class ReadHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(ReadCommand $command) : ReadResponse
    {
        $data = $this->userRepository->getAllUsers();
        return new ReadResponse(true ,"", $data);
    }
}
