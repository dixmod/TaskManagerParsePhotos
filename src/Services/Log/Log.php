<?php

namespace Dixmod\Services\Log;

use Dixmod\DTO\LogDTO;
use Dixmod\Repository\Log\LogRepository;

class Log extends LogDTO implements LogInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new LogRepository();
    }

    public function add(LogDTO $dto)
    {
        $this->status = $dto->status;
        $this->task = $dto->task;
        $this->date = $dto->date;

        $this->repository->add();
    }
}