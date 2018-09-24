<?php

namespace Dixmod\Services\Task;

use Dixmod\DTO\StatusDTO;

class Status extends StatusDTO implements StatusInterface
{
    const CREATE = 1;
    const IN_WORK = 2;
    const DONE = 3;
    const ERROR = 4;

    /**
     * Status constructor.
     * @param StatusDTO $dto
     */
    public function __construct(StatusDTO $dto)
    {
        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->description = $dto->description;
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
    public function getDescription()
    {
        return $this->description;
    }
}