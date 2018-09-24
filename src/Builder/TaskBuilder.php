<?php

namespace Dixmod\Builder;

use Dixmod\DTO\TaskDTO;
use Dixmod\Services\Task\Task;

class TaskBuilder
{
    /** @var StatusBuilder */
    private $statusBuilder;

    /** @var UserBuilder */
    private $userBuilder;

    public function __construct()
    {
        $this->statusBuilder = new StatusBuilder();
        $this->userBuilder = new UserBuilder();
    }

    /**
     * @param array $taskArray
     * @return Task
     */
    public function build(array $taskArray): Task
    {
        $task = new Task($this->createTaskDTO($taskArray));

        return $task;
    }

    /**
     * @param array $task
     * @return TaskDTO
     */
    private function createTaskDTO(array $task): TaskDTO
    {
        $dto = new TaskDTO();
        $dto->id = $task['id'];
        $dto->name = $task['name'];
        $dto->type = $task['type'];
        $dto->status = $task['status'];
        $dto->description = $task['name'];
        $dto->status = $this->statusBuilder->buildById($task['status']);
        $dto->user = $this->userBuilder->buildById($task['user']);
        $dto->user = $this->userBuilder->buildById($task['user']);

        return $dto;
    }
}