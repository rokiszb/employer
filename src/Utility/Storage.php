<?php
declare(strict_types=1);

namespace App\Utility;

use http\Exception\RuntimeException;
use SQLite3;

class Storage extends SQLite3
{
    private const DB_FILE = 'database.db';
    private static $instance;

    function __construct()
    {

        parent::__construct(self::DB_FILE);
    }

    public function insert(string $name): void
    {
        $this->up();
        $db = self::getInstance();
        $isFound = $this->select($name);

        if (empty($isFound)) {
            $sql = "INSERT INTO EMPLOYEE (NAME) VALUES ('$name')";
            $db->exec($sql);
        }
    }

    public static function getInstance()
    {

        if (self::$instance == null) {
            $className = __CLASS__;
            self::$instance = new $className;
        }

        if (!self::$instance) {
            throw new RuntimeException(self::$instance->lastErrorMsg(), 500);
        }

        return self::$instance;
    }

    public function up()
    {
        $db = self::getInstance();
        $sql = "CREATE TABLE IF NOT EXISTS EMPLOYEE (NAME TEXT NOT NULL)";
        $db->exec($sql);
    }

    public function select(string $name): array
    {
        $finalRes = [];
        $sql = "SELECT NAME FROM EMPLOYEE WHERE NAME = '$name'";
        /** @var Storage $db */
        $db = self::getInstance();
        $query = $db->query($sql);
        while ($result = $query->fetchArray(SQLITE3_ASSOC)) {
            $finalRes[] = $result;
        }

        return $finalRes;
    }
}