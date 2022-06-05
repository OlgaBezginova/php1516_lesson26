<?php

namespace BezghinovaDev\Framework;

use \PDO;

class DB
{
    protected object $pdo;
    protected static $instance;

    public static int $countSql = 0;
    public static array $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/database.php';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];

        $db['DNS'] = 'mysql:host=' . $db['DB_HOST'] . ';port=' . $db['DB_PORT'] . ';dbname=' . $db['DB_DATABASE'];

        $this->pdo = new PDO($db['DNS'], $db['DB_USERNAME'], $db['DB_PASSWORD'], $options);
    }

    public static function instance(): DB
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

//    public function execute($sql, $params = [])
//    {
//        self::$countSql++;
//        self::$queries[] = $sql;
//        $PDOStatement = $this->pdo->prepare($sql);
//        return $PDOStatement->execute($params);
//    }

    public function query(string $slq, array $param = []): array
    {
        // Для дебага
        self::$countSql++;       // колличесво запросов на странице
        self::$queries[] = $slq; // все запросы на странице

        $PDOStatement = $this->pdo->prepare($slq);

        $result = $PDOStatement->execute($param);
        if ($result !== false) {
            return $PDOStatement->fetchAll();
        }
        echo 'По заданому запросу ничего не найдено';
        return [];
    }
}
