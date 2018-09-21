<?php

namespace Dixmod\Services\Task;


class Task extends AbstractTask implements TaskInterface
{
    public function run()
    {
        echo "Запуск задача ".$this->id.PHP_EOL;
    }
}