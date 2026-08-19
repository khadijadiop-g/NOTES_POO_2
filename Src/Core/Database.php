<?php

class Database
{

    private function __construct(){}

    private static function getConnexion(): PDO | null
    {

        $config = require __DIR__ . '/Env.php';
        try {
            $pdo = null;
            $dsn = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
            $pdo = new PDO($dsn, $config['user'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (PDOException $e) {
            error_log("Connexion PostgreSQL échouée : " . $e->getMessage());
            return null;
        }
    }

    public static function query(string $sql, bool $single = true): mixed
    {
        $query = self::getConnexion()->query($sql);
        return $single ? $query->fetch() : $query->fetchAll(PDO::FETCH_OBJ);
    }

    private static function prepare(string $sql, array $datas): PDOStatement
    {
        $prepare = Database::getConnexion()->prepare($sql);
        $prepare->execute($datas);
        return $prepare;
    }

    public static function executeQuery(string $sql, array $datas, bool $single = true): mixed
    {
        $statement = self::prepare($sql, $datas);
        return $single ? $statement->fetch() : $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public static function executeUpdate(string $sql, array $datas): int|string
    {
        $statement = self::prepare($sql, $datas);
        return (str_starts_with(strtoupper(trim($sql)), 'INSERT')) ? self::getConnexion()->lastInsertId() : $statement->rowCount();
    }

    public static function getAllData(string $tableName): array
    {
        $sql = "SELECT * FROM $tableName";
        return self::query($sql, false);
    }
}
