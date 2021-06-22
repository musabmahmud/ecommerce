<?php

include_once '../lib/database.php';
include_once '../helpers/format.php';



class Brand{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
    public function brandInsert($name){
        $name = $this->format->validation($_POST['brandname']);
        $name = mysqli_real_escape_string($this->db->link, $name);
        
        $query = "INSERT INTO product_brand(brandname) VALUES('$name')";
        $insertBrand = $this->db->insert($query);
        if($insertBrand){
            $msg = "<span class='alert alert-success'><strong>Well done!</strong> Successful..!</span>";
            return $msg;
        }
        else{
            $msg = "<span class='alert alert-danger'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }

    public function getAll(){
        $query = "SELECT * FROM product_brand ORDER BY brandid DESC";
        $result = $this->db->select($query);
        return $result;
    }

    
    public function getBrandById($id){
        $query = "SELECT * FROM product_brand WHERE brandid = '$id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function brandUpdate($name,$id){
        $name = $this->format->validation($_POST['brandname']);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $id = mysqli_real_escape_string($this->db->link, $id);
        
        $query = "UPDATE product_brand SET brandname = '$name' WHERE brandid = '$id'";
        $update_query = $this->db->update($query);
        if($update_query){
            $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
            return $msg;
        }
        else{
            $msg = "<span class='alert alert-danger d-block'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }

    public function delBrandById($id){
        $query = "DELETE FROM product_brand WHERE brandid = '$id'";
        $deleteCat = $this->db->delete($query);
        if($deleteCat){
            $msg = "<span class='alert alert-danger d-block'><strong>Well done!</strong> Successfully Delete..!</span>";
            return $msg;
        }
        else{
            $msg = "<span class='alert alert-danger d-block'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
}
?>