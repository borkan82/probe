<?php
include "class/class.Users.php";
class DbParams
{
    private $hostname = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbName   = 'arbeitsprobe_db';

    private static $conn;

    public function __construct()
    {

        try {
            self::$conn = new PDO("mysql:host={$this->hostname};dbname=$this->dbName;charset=utf8", $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            die("Connection error: " . $exc->getMessage());
        }
    }

    public function getConnection()
    {
        return self::$conn;
    }
}