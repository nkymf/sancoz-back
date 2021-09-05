<?php

namespace App\Src\V1\Domain\Repositories;


use App\Src\V1\Domain\Models\User;

interface UserRepository
{
    public function create(string $email, string $birthDate, int $civilStatus, string $name, string $phone): ?User;

    public function update(): bool;

    public function getAllUsers();

    public function delete(User $user);

    public function find(int $id);

    public function checkIfUserExists(string $email): ?User;
}
