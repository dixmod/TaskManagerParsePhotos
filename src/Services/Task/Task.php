<?php

namespace Dixmod\Services\Task;

use Dixmod\DTO\TaskDTO;
use Dixmod\Repository\Task\TaskRepository;
use Dixmod\Services\User\User;

class Task extends TaskDTO implements TaskInterface
{
    public function __construct(TaskDTO $taskDTO)
    {
        $this->id = $taskDTO->id;
        $this->name = $taskDTO->name;
        $this->description = $taskDTO->description;
        $this->type = $taskDTO->type;
        $this->status = $taskDTO->status;
        $this->user = $taskDTO->user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param $status
     * @return void
     */
    public function changeStatus($status)
    {
        $this->status = $status;
        $this->save();
    }


    /**
     * @return TaskInterface
     * @throws \Exception
     */
    private function getWorker(): TaskInterface
    {
        switch ($this->type) {
            case 1:
                return new Type\Photo\Download();
            case 2:
                return new Type\Photo\Parse();
            case 3:
                return new Type\Photo\Send();
            default:
                throw new \Exception('Unknown task type');
        }
    }


    /**
     * @return bool
     * @throws \Exception
     */
    function run()
    {
        try {
            /** @var Type $worker */
            $worker = $this->getWorker();
            $worker->setTaskId($this->id);
            $worker->run();
        } catch (\Exception $e) {
            throw new \Exception('Error executor');
        }

        return true;
    }

    public function save()
    {
        $repository = new TaskRepository();
        $repository->update(
            [
                'status' => $this->status
            ],
            $this->id
        );
    }
}