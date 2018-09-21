<?php

namespace Dixmod\Services\User;


use Dixmod\DTO\UserDTO;

class User implements UserInterface
{
    protected $id;
    protected $name;
    protected $email;

    public function __construct(UserDTO $userDTO)
    {
        $this->id = $userDTO->id;
        $this->name = $userDTO->name;
        $this->email = $userDTO->email;
    }
}