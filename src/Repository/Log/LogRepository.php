<?php

namespace Dixmod\Repository\Log;

use Dixmod\Repository\AbstractRepository;
use Dixmod\Repository\RepositoryInterface;

class LogRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'log';
}