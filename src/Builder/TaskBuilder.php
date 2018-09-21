<?php

namespace Dixmod\Builder;

use Dixmod\DTO\TaskDTO;
use Dixmod\Services\Task\Task;
use Dixmod\Repository\User\UserRepository;


class TaskBuilder
{
    public function build(array $taskArray): Task
    {
        $task = new Task($this->createTaskDTO($taskArray));

        return $task;
    }

    private function createTaskDTO(array $task): TaskDTO
    {
        $dto = new TaskDTO();
        $dto->id = $task['id'];
        $dto->name = $task['name'];
        $dto->description = $task['name'];
        $dto->type = $task['type'];
        $dto->status = $task['status'];

        ;

        $dto->user = (new UserBuilder())->build(
            (new UserRepository())->getById($task['user'])
        );

        return $dto;
    }
}