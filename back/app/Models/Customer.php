<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Customer
{
    private $db;

    const ID = 'id';
    const NAME = 'name';
    const BIRTH_DATE = 'birth_date';
    const PHONE = 'phone';
    const RG = 'rg';
    const CPF = 'cpf';

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
