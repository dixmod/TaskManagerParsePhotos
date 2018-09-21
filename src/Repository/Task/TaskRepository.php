<?php

namespace Dixmod\Repository\Task;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class TaskRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'task';

    public function findAll()
    {
        return $this->db->getAll('select * from '.$this->getTable());
    }

    public function getById()
    {

    }
}