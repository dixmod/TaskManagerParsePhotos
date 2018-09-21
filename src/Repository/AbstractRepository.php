<?php

namespace Dixmod\Repository;

use Dixmod\Application\Config;
use SafeMySQL;

abstract class AbstractRepository
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = new SafeMySQL(Config::getOptions('db'));
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }
}