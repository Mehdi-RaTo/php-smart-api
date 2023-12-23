<?php

/**
 * @author  Mehdi_RaTo (https://t.me/Mehdi_RaTo)
 */
class Database
{
    private $connection;

    public function __construct()
    {
        $this->Connect();
    }
    public function __destruct()
    {
        $this->DisConnect();
    }

    private function Connect()
    {
        $this->connection = new PDO(
            "mysql:host=" . APP_DATABASE_HOST . ";dbname=" . APP_DATABASE_NAME . ";charset=utf8mb4",
            APP_DATABASE_USERNAME,
            APP_DATABASE_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+00:00'"
            ]
        );
    }
    private function DisConnect()
    {
        $this->connection = null;
    }

    public function Query($strQuery,  $arrParams = [])
    {
        $stmt = $this->connection->prepare($strQuery);
        $stmt->execute($arrParams);
        return $stmt->fetchAll();
    }
    public function Execute($strQuery,  $arrParams = [])
    {
        $stmt = $this->connection->prepare($strQuery);
        $stmt->execute($arrParams);
        return $stmt->rowCount();
    }

    public function LastInsertID()
    {
        return $this->connection->lastInsertId();
    }

    public function StartTransaction()
    {
        return $this->connection->beginTransaction();
    }
    public function EndTransaction()
    {
        return $this->connection->commit();
    }
    public function CancelTransaction()
    {
        return $this->connection->rollback();
    }
}
