<?php

namespace Dixmod\Services\Task;

use Dixmod\DTO\TaskDTO;
use Dixmod\Services\User\User;

abstract class AbstractTask implements TaskInterface
{
    protected $id;
    protected $name;
    protected $description;
    protected $type;
    protected $status;
    protected $user;

    public function __construct(TaskDTO $taskDTO)
    {
        $this->id = $taskDTO->id;
        $this->name = $taskDTO->name;
        $this->description = $taskDTO->description;
        $this->type = $taskDTO->type;
        $this->status = $taskDTO->status;
        $this->user = $taskDTO->user;
    }

    abstract function run();
}