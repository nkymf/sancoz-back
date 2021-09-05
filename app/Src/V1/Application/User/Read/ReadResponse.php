<?php

namespace App\Src\V1\Application\User\Read;

use App\Src\Shared\Infrastructure\ValueObject\BasicResponse;

class ReadResponse extends BasicResponse {

    public function __construct(bool $status, string $message = "", $data = null)
    {
        parent::__construct($status, $message, $data);
    }
}
