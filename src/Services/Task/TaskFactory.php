<?php

namespace Dixmod\Services\Task;

use Dixmod\Builder\TaskBuilder;
use Dixmod\Repository\Task\TaskRepository;

class TaskFactory
{
    /** @var TaskRepository */
    private $taskRepository;

    /** @var TaskBuilder */
    private $taskBuilder;

    /**
     * TaskFactory constructor.
     */
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
        $this->taskBuilder = new TaskBuilder();
    }

    /**
     * @param array $filter
     * @return array
     */
    public function get(array $filter = []): array
    {
        $arTask = $this->taskRepository->findAll($filter);
        foreach ($arTask as &$task) {
            $task = $this->taskBuilder->build($task);
        }

        return $arTask;
    }
}