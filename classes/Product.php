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
    public function productDetails($id)
    {
        $query = "SELECT product_table.*, category.catName, product_brand.brandname
        From product_table
        INNER JOIN category ON product_table.catId = category.catId
        INNER JOIN product_brand ON product_table.brandid = product_brand.brandid WHERE product_table.productId = $id";
        $result = $this->db->select($query);
        return $result;
    }
}