<?php

namespace App\Src\V1\Application\User\Delete;

use App\Src\Shared\Infrastructure\ValueObject\BasicResponse;

class DeleteResponse extends BasicResponse {

    public function __construct(bool $status, string $message = "", $data = null)
    {
        parent::__construct($status, $message, $data);
    }
}
