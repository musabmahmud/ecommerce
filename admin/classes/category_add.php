<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';

class Category{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
    public function catInsert($name){
        $name = $this->format->validation($_POST['name']);
        $name = mysqli_real_escape_string($this->db->link, $name);
        
        $query = "INSERT INTO category(name) VALUES('$name')";
        $insertcat = $this->db->insert($query);
        if($insertcat){
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
        $query = "SELECT * FROM category ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
}
?>