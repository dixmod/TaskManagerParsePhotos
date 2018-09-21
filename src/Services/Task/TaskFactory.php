<?php

namespace Dixmod\Services\Task;

use Dixmod\Builder\TaskBuilder;
use Dixmod\Repository\Task\TaskRepository;

class TaskFactory
{
    /** @var TaskRepository */
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function get()
    {

        $taskBuilder = new TaskBuilder(
            /*new CatalogProductVariantBuilder(new VariantsSizeSort()),
            new PictureBuilder()*/
        );



        $arTask = $this->taskRepository->findAll();
        foreach ($arTask as &$task) {
            $task = $taskBuilder->build($task);
        }

        return $arTask;
    }
}