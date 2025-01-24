<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}