<?php

namespace Dixmod\Repository\User;

use Dixmod\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    protected $table = 'user';

    public function findAll($filter)
    {

    }

    public function getById(int $id)
    {
        return $this->db->getAll('select * from `' . $this->getTable() . '` where id = "' . $id . '"')[0];
    }
}