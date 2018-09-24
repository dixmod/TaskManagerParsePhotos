<?php

namespace Dixmod\Builder;

use Dixmod\DTO\UserDTO;
use Dixmod\Repository\User\UserRepository;
use Dixmod\Services\User\User;

class UserBuilder
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * @param int $id
     * @return User
     */
    public function buildById(int $id): User
    {
        $userArray = $this->userRepository->getById($id);

        $user = $this->build($userArray);

        return $user;
    }

    /**
     * @param $userArray
     * @return User
     */
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