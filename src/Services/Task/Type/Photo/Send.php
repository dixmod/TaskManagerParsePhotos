<?php

namespace Dixmod\Services\Task\Type\Photo;

use Dixmod\Repository\Task\Type\Photo\SendRepository;
use Dixmod\Services\Task\TaskInterface;
use Dixmod\Services\Task\Type;

class Send extends Type implements TaskInterface
{
    /** @var SendRepository  */
    protected $repository;

    public function __construct()
    {
        $this->repository = new SendRepository;
    }

    public function run()
    {

    }
}