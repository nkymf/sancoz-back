<?php

namespace App\Src\Shared\Infrastructure\ValueObject;

class BasicResponse
{
    protected $message;
    protected $data;
    protected $status;

    public function __construct(int $status, string $message, $data = null)
    {
        $this->message = $message;
        $this->status = $status;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
}
