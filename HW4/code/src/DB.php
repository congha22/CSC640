<?php
// src/DB.php
namespace App;

class DB {
    private static ?\PDO $pdo = null;
    public static function get(): \PDO {
        if (self::$pdo === null) {
            $c = require __DIR__ . '/config.php';
            $db = $c['db'];
            $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset={$db['charset']}";
            self::$pdo = new \PDO($dsn, $db['user'], $db['pass'], [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);
        }
        return self::$pdo;
    }
}
