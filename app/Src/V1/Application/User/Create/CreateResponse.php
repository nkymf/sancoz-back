<?php

namespace App\Src\V1\Application\User\Create;

use App\Src\Shared\Infrastructure\ValueObject\BasicResponse;

class CreateResponse extends BasicResponse {

    public function __construct(bool $status, string $message = "", $data = null)
    {
        parent::__construct($status, $message, $data);
    }
}
