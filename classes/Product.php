<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';


class Product{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
    public function getFeatureProduct(){
        $query = "SELECT * FROM product_table WHERE type='2' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
}