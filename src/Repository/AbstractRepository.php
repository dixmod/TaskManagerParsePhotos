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

    /**
     * @param array $filters
     * @return array
     */
    public function findAll(array $filters = []): array
    {
        $sql = 'SELECT * FROM ?n';
        $params = [
            $sql,
            $this->getTable()
        ];

        if (!empty($filters)) {
            $sql .= ' WHERE 1=1';
            foreach ($filters as $filterCol => $filterVal) {
                $sql .= ' AND ?n = ?s';
                $params[] = $filterCol;
                $params[] = $filterVal;
            }
            $params[0] = $sql;
        }

        return call_user_func_array(
            [
                $this->db,
                "getAll"
            ],
            $params
        );

    }

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->db->getRow(
            'SELECT * FROM ?n WHERE id = ?i',
            $this->getTable(),
            $id
        );
    }

    /**
     * @param array $data
     * @return bool|mixed
     */
    public function insert(array $data){
        if(empty($data))
            return false;

        $params = [
            'INSERT INTO ?n SET ',
            $this->getTable()
        ];

        $fields = [];
        foreach ($data as $col => $val) {
            $fields[] = '?n = ?s';
            $params[] = $col;
            $params[] = $val;
        }
        $params[0] .= join(',', $fields);

        return call_user_func_array(
            [
                $this->db,
                "query"
            ],
            $params
        );
    }

    /**
     * @param array $data
     * @param $id
     * @return bool|mixed
     */
    public function update(array $data, $id)
    {
        if(empty($data))
            return false;

        $params = [
            'UPDATE ?n SET ',
            $this->getTable()
        ];

        $fields = [];
        foreach ($data as $col => $val) {
            $fields[] = '?n = ?s';
            $params[] = $col;
            $params[] = $val;
        }
        $params[0] .= join(',', $fields);
        $params[0] .= ' WHERE id = ?i';

        $params[] = $id;

        return call_user_func_array(
            [
                $this->db,
                "query"
            ],
            $params
        );
    }
}