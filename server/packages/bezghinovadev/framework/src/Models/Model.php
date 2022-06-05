<?php

namespace BezghinovaDev\Framework\Models;

use BezghinovaDev\Framework\DB;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $pKey = 'id';

    public function __construct()
    {
        $this->pdo = DB::instance();
    }

    public function findAll()
    {
        $table = htmlspecialchars($this->table);
        $sql = "SELECT * FROM $table";

        return $this->pdo->query($sql);
    }

    public function where($key, $symbol, $search)
    {
        $table  = htmlspecialchars($this->table);

        $key    = htmlspecialchars($key);
        $symbol = htmlspecialchars($symbol);
        $search = htmlspecialchars($search);

        $sql = "SELECT * FROM $table WHERE $key $symbol '$search'";


        return $this->pdo->query($sql);
    }

    public function insertOne($insert)
    {
        $table  = htmlspecialchars($this->table);

        $keys = array_keys($insert);
        $values = array_values($insert);

        array_map('htmlspecialchars', $keys);
        array_map('htmlspecialchars', $values);

        $keys = implode(',', $keys);
        $values = '\''.implode('\',\'', $values).'\'';

        $sql = "INSERT INTO $table ($keys) VALUES ($values)";

        $this->pdo->query($sql);
    }

    public function updateOne($update, $pKey)
    {
        $table  = htmlspecialchars($this->table);
        $pKey  = htmlspecialchars($pKey);

        $sql = "UPDATE $table SET ";

        foreach ($update as $key => $value) {
            $sql .= $key . '=\''. $value . '\',';
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE $this->pKey='$pKey'";

        $this->pdo->query($sql);
    }

    public function deleteOne($pKey)
    {
        $table  = htmlspecialchars($this->table);
        $pKey  = htmlspecialchars($pKey);

        $sql = "DELETE FROM $table WHERE $this->pKey='$pKey'";

        $this->pdo->query($sql);
    }

    public function like($key, $pattern)
    {
        $table  = htmlspecialchars($this->table);

        $key    = htmlspecialchars($key);
        $pattern = htmlspecialchars($pattern);

        $sql = "SELECT * FROM $table WHERE $key LIKE '$pattern'";

        return $this->pdo->query($sql);
    }

    public function whereIn($key, array $search)
    {
        $table = htmlspecialchars($this->table);

        $key = htmlspecialchars($key);
        array_map('htmlspecialchars', $search);
        $search = '\''.implode('\',\'',$search).'\'';

        $sql = "SELECT * FROM $table WHERE $key IN ($search)";

        return $this->pdo->query($sql);
    }

    public function orderBy($keys, $order)
    {
        $table = htmlspecialchars($this->table);

        $order = htmlspecialchars($order);

        array_map('htmlspecialchars', $keys);
        $keys = implode(',',$keys);

        $sql = "SELECT * FROM $table ORDER BY $keys $order";

        return $this->pdo->query($sql);
    }

    public function join($joinTable, $joinKey, $type = 'inner')
    {
        $table1  = htmlspecialchars($this->table);
        $table2  = htmlspecialchars($joinTable);
        $joinKey = htmlspecialchars($joinKey);
        $type    = strtoupper(htmlspecialchars($type));

        $sql = "SELECT * FROM $table1 $type JOIN $table2 ON $table1.$this->pKey=$table2.$joinKey ";

        return $this->pdo->query($sql);
    }
}
