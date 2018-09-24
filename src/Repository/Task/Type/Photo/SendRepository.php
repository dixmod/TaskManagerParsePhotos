<?php

namespace Dixmod\Repository\Task\Type\Photo;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class SendRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'typeTaskPhotoSend';
}