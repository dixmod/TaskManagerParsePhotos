<?php

namespace Dixmod\Repository\Task\Type\Photo;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class ParseRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'typeTaskPhotoParse';


}