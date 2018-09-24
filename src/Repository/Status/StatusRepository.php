<?php

namespace Dixmod\Repository\Status;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class StatusRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'taskStatus';
}