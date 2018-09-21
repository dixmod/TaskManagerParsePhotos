<?php

namespace Dixmod\Builder;

use Dixmod\DTO\UserDTO;
use Dixmod\Services\User\User;

class UserBuilder
{
    public function build(array $userArray): User
    {
        $user = new User($this->createUserDTO($userArray));

        return $user;
    }

    private function createUserDTO(array $user): UserDTO
    {
        $dto = new UserDTO();
        $dto->id = $user['id'];
        $dto->name = $user['name'];
        $dto->email = $user['email'];
        return $dto;
    }
}