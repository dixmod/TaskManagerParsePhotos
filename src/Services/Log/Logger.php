<?php

namespace Dixmod\Services\Log;

use Dixmod\Repository\Log\LogRepository;

class Logger
{
    /** @var Logger */
    private static $_instance;

    /** @var LogRepository */
    private $repository;

    /**
     * Logger constructor.
     */
    private function __construct()
    {
        $this->repository = new LogRepository();
    }

    /**
     * @param int $task
     * @param int $status
     * @param string $message
     */
    public static function add(int $task, int $status, $message = '')
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        self::$_instance->addRecord($task, $status, $message);
    }

    /**
     * @param int $task
     * @param int $status
     * @param string $message
     * @return bool|mixed
     */
    private function addRecord(int $task, int $status, string $message)
    {
        return $this->repository->insert([
            'task' => $task,
            'status' => $status,
            'date' => date('Y-m-d H:i:s'),
            'message' => $message
        ]);
    }
}