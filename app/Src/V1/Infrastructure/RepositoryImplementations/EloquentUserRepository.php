<?php

namespace App\Src\V1\Infrastructure\RepositoryImplementations;

use App\Src\V1\Domain\Models\User;
use App\Src\V1\Domain\Repositories\UserRepository;
use PDOException;

class EloquentUserRepository implements UserRepository
{
    public function create(string $email, string $birthDate, int $civilStatus, string $name, string $phone): ?User
    {
        try {
            return User::create([
                'email' => $email,
                'birth_date' => $birthDate,
                'civil_status' => $civilStatus,
                'name' => $name,
                'phone' => $phone
            ]);
        } catch (PDOException $exception) {
            return null;
        }
    }

    public function update(): bool
    {
        // TODO: Implement update() method.
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

    public function checkIfUserExists(string $email): ?User
    {
        return User::where('email', $email)->first();

    }

    public function find(int $id)
    {
        return User::find($id);
    }
}
