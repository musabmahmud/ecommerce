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
}
?>