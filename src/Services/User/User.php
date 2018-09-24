<?php

namespace Dixmod\Services\User;

use Dixmod\DTO\UserDTO;

class User extends UserDTO implements UserInterface
{
    /**
     * User constructor.
     * @param UserDTO $userDTO
     */
    public function __construct(UserDTO $userDTO)
    {
        $this->id = $userDTO->id;
        $this->name = $userDTO->name;
        $this->email = $userDTO->email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}