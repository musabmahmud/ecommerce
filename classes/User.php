<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';


class User{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
}