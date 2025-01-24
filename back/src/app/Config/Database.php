<?php

namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $dbname = 'kabum';
    private $username = 'kabum';
    private $password = 'kabum';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("❌ Erro na conexão: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}