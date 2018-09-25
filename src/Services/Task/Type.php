<?php

namespace Dixmod\Services\Task;

use Dixmod\Repository\RepositoryInterface;

class Type
{
    public $id;

    /** @var RepositoryInterface */
    protected $repository;

    protected $params = [];

    /**
     * @param mixed $id
     */
    public function setTaskId($id): void
    {
        $this->id = $id;
        $this->params = $this->getParams();
    }

    /**
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->repository->getById($this->getTaskId());
    }
}