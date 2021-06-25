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
    
    public function getNewProduct()
    {
        $query = "SELECT * FROM product_table ORDER BY productId DESC LIMIT 20";
        $result = $this->db->select($query);
        return $result;
    }
    public function generalProduct()
    {
        $query = "SELECT * FROM product_table WHERE type = '0' ORDER BY productId DESC LIMIT 30";
        $result = $this->db->select($query);
        return $result;
    }
    public function popularProduct()
    {
        $query = "SELECT * FROM product_table WHERE type = '1' ORDER BY productId DESC LIMIT 30";
        $result = $this->db->select($query);
        return $result;
    }
    public function hotProduct()
    {
        $query = "SELECT * FROM product_table ORDER BY price DESC LIMIT 30";
        $result = $this->db->select($query);
        return $result;
    }
    public function brandProduct()
    {
        $query = "SELECT * FROM product_table ORDER BY brandid DESC LIMIT 30";
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
    
    public function getcatName()
    {
        $query = "SELECT * FROM category";
        $result = $this->db->select($query);
        return $result;
    }

    public function shopProduct()
    {
        $query = "SELECT * FROM product_table";
        $result = $this->db->select($query);
        return $result;
    }
    public function probyCat($id)
    {
        $query = "SELECT * FROM product_table WHERE catId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}