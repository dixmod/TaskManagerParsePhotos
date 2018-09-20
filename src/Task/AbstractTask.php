<?php

namespace Dixmod\Task;

abstract class AbstractTask implements TaskInterface
{
    abstract function run();
}