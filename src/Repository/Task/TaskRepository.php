<?php

namespace Dixmod\Repository\Task;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class TaskRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'task';
}