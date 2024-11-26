<?php

require_once 'core/database.php';

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }
}