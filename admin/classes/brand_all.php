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

    public function brandimgInsert($image){
        $image = $this->format->validation($_POST['image']);
        $image = mysqli_real_escape_string($this->db->link, $image);
        
        $allow_format = ['jpg', 'png', 'jpeg'];

        $file_name = $image['image']['name'];
        $file_size = $image['image']['size'];
        $file_tmp = $image['image']['tmp_name'];
        $explode = explode('.', $file_name);
        $ext = strtolower(end($explode));
        
        if (empty($related_file_name)){
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        } elseif ($file_size > 40000000) {
            $msg = "<span class='alert alert-warning d-block'>Upload Less Than 5 Mb(image<5)</span>";
            return $msg;
        }
        elseif (in_array($ext, $allow_format)) {
            $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
            $uploaded_image = "../assets/img/brand/" . $unique_image;
            move_uploaded_file($file_tmp, $uploaded_image);

            $query = "INSERT INTO brandimage(image) VALUES($unique_image)";
            $productInsert = $this->db->insert($query);
            if ($productInsert) {
                $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
                return $msg;
            } else {
                $msg = "<span class='alert alert-danger d-block'>
                    Oh snap! Error...!</span>";
                return $msg;
            }
        } 
        else {
            $msg = "<span class='alert alert-warning d-block'>Please Upload JPG/PNG/JPEG</span>";
            return $msg;
        }
    }

    public function getAll(){
        $query = "SELECT * FROM product_brand ORDER BY brandid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getimgAll(){
        $query = "SELECT * FROM brandimage ORDER BY bandImageId DESC";
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
    public function delBrandImgById($id){
        $query = "DELETE FROM brandimage WHERE bandImageId = '$id'";
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