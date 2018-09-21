<?php

namespace Dixmod\Application;

use Dixmod\Services\Task\TaskFactory;

class Manager implements ApplicationInterface
{
    public function run()
    {
        $tasks = (new TaskFactory())->get();
        foreach ($tasks as $task) {
            print_r($task);
            $task->run();
        }
    }
}