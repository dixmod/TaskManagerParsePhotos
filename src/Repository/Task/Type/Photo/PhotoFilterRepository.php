<?php

namespace Dixmod\Repository\Task\Type\Photo;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class PhotoFilterRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'photoFilter';
}