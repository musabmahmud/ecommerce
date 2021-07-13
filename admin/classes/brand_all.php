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

    public function getimgAll(){
        $query = "SELECT * FROM brandimage ORDER BY bandImageId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAll(){
        $query = "SELECT * FROM product_brand ORDER BY brandid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getBrandById($id){
        $query = "SELECT * FROM product_brand WHERE brandid = '$id'";
        $result = $this->db->select($query);
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

    

    public function brandimgInsert($data,$files){

        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_tmp = $files['image']['tmp_name'];
        $explode = explode('.', $file_name);
        $ext = strtolower(end($explode));
        
        $allow_format = ['jpg', 'png', 'jpeg'];

        if (empty($file_name)){
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        }
        elseif (in_array($ext, $allow_format)) {
            $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
            $uploaded_image = "../assets/img/brand/" . $unique_image;
            move_uploaded_file($file_tmp, $uploaded_image);

            $query = "INSERT INTO brandimage(image) VALUES('$unique_image')";
            $brandImgInsert = $this->db->insert($query);
            if ($brandImgInsert) {
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
    public function brandImgUpdate($data,$files){

        $id = $this->format->validation($_POST['bandImageId']);
        $id = mysqli_real_escape_string($this->db->link, $id);
        
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_tmp = $files['image']['tmp_name'];
        $explode = explode('.', $file_name);
        $ext = strtolower(end($explode));
        
        $allow_format = ['jpg', 'png', 'jpeg'];

        if (empty($file_name)){
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        }
        elseif (in_array($ext, $allow_format)) {
            $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
            $uploaded_image = "../assets/img/brand/" . $unique_image;
            move_uploaded_file($file_tmp, $uploaded_image);

            $query = "UPDATE brandimage SET 
            image = '$unique_image' WHERE bandImageId = '$id'";
            $brandImgInsert = $this->db->update($query);
            if ($brandImgInsert) {
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
    public function getBrandImgById($id){
        $query = "SELECT * FROM brandimage WHERE bandImageId = '$id'";
        $result = $this->db->select($query);
        return $result;
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