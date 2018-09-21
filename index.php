<?php
    require __DIR__ . '/vendor/autoload.php';

    use Dixmod\Application\Manager;

    $taskManager = new Manager();
    $taskManager->run();