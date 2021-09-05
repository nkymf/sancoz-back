<?php

namespace App\Src\V1\Application\User\Create;

class CreateCommand
{
    private $name;
    private $phone;
    private $email;
    private $birthDate;
    private $civilState;

    public function __construct(string $name, string $phone, string $email, $birthDate, $civilState)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->civilState = $civilState;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getCivilState()
    {
        return $this->civilState;
    }

    /**
     * @param mixed $civilState
     */
    public function setCivilState($civilState): void
    {
        $this->civilState = $civilState;
    }
}
