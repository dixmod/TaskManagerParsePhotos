<?php

namespace Dixmod\Services\Task\Type\Photo;

use Dixmod\Repository\Task\Type\Photo\ParseRepository;
use Dixmod\Services\Task\{
    TaskInterface,
    Type
};

class Parse extends Type implements TaskInterface
{
    /** @var ParseRepository  */
    protected $repository;


    public function __construct()
    {
        $this->repository = new ParseRepository;
    }

    public function run()
    {

    }
}