<?php

namespace Dixmod\Application;

use Dixmod\Services\Task\Status;
use Dixmod\Services\Task\Task;
use Dixmod\Services\Task\TaskFactory;

class Manager implements ApplicationInterface
{
    /** @var TaskFactory */
    private $taskFactory;

    /**
     * Manager constructor.
     */
    public function __construct()
    {
        $this->taskFactory = new TaskFactory();
    }

    /**
     *
     */
    public function run()
    {
        $tasks = $this->taskFactory->get([
            'status' => Status::CREATE
        ]);

        foreach ($tasks as &$task) {
            /** @var $task Task */
            try{
                $task->changeStatus(Status::IN_WORK);
                $task->run();
                $task->changeStatus(Status::DONE);
            }catch (\Exception $exception){
                print_r($exception->getMessage());
                $task->changeStatus(Status::ERROR);
            }
        }
    }
}