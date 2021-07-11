<?php

include_once '../lib/database.php';
include_once '../helpers/format.php';


class Products
{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }

    public function productInsert($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);


        
        $allow_format = ['jpg', 'png', 'jpeg'];

        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_tmp = $files['image']['tmp_name'];
        $explode = explode('.', $file_name);
        $ext = strtolower(end($explode));

        $related_file_name = $files['relatedImage']['name'];
        $related_file_size = $files['relatedImage']['size'];
        $related_file_tmp = $files['relatedImage']['tmp_name'];
        $related_explode = explode('.', $related_file_name);
        $related_ext = strtolower(end($related_explode));

        if ($productName == "" || $catId == "" || $brandid == "" || $price == "" || $body == "" || empty($file_name) || empty($related_file_name)){
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        } elseif ($file_size > 40000000 || $related_file_size > 40000000) {
            $msg = "<span class='alert alert-warning d-block'>Upload Less Than 5 Mb(image<5)</span>";
            return $msg;
        } elseif (in_array($ext, $allow_format) && in_array($related_ext, $allow_format)) {
            $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
            $uploaded_image = "../assets/img/product/" . $unique_image;
            move_uploaded_file($file_tmp, $uploaded_image);

            $related_unique_image = substr(md5(time()), 0, 8) . '.' . $related_ext;
            $related_uploaded_image = "../assets/img/product/" . $related_unique_image;
            move_uploaded_file($related_file_tmp, $related_uploaded_image);

            $query = "INSERT INTO product_table(productName,catId,brandid,price,productCode,type,body,image,relatedImage) VALUES('$productName','$catId','$brandid','$price','$productCode','$type','$body','$unique_image','$related_unique_image')";
            $productInsert = $this->db->insert($query);
            if ($productInsert) {
                $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
                return $msg;
            } else {
                $msg = "<span class='alert alert-danger d-block'>
                    Oh snap! Error...!</span>";
                return $msg;
            }
        } else {
            $msg = "<span class='alert alert-warning d-block'>Please Upload JPG/PNG/JPEG</span>";
            return $msg;
        }
    }


    public function getAll()
    {
        $query = "SELECT product_table.*, category.catName, product_brand.brandname
        From product_table
        INNER JOIN category ON product_table.catId = category.catId
        INNER JOIN product_brand ON product_table.brandid = product_brand.brandid
        ORDER BY product_table.productId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM product_table WHERE productId = '$id'";
        $result = $this->db->update($query);
        return $result;
    }
    public function productUpdate($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);


        $file_name = $files['image']['name'];
        $related_file_name = $files['relatedImage']['name'];

        if ($productName == "" || $catId == "" || $brandid == "" || $price == "" || $body == "") {
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        } elseif (!empty($file_name = $files['image']['name']) && !empty($related_file_name = $files['relatedImage']['name'])) {

            $delquery = "SELECT * FROM product_table WHERE productId = '$id'";
            $getData = $this->db->select($delquery);
            if($getData){
                while($delImg = $getData->fetch_assoc()){
                    $delLink = $delImg['image'];
                    unlink($delLink);
                }
            }

            $file_size = $files['image']['size'];
            $file_tmp = $files['image']['tmp_name'];
            $explode = explode('.', $file_name);
            $ext = strtolower(end($explode));
            $allow_format = ['jpg', 'png', 'jpeg'];



            $related_file_size = $files['relatedImage']['size'];
            $related_file_tmp = $files['relatedImage']['tmp_name'];
            $related_explode = explode('.', $file_name);
            $related_ext = strtolower(end($explode));
            $related_allow_format = ['jpg', 'png', 'jpeg'];

            if ($file_size > 40000000 && $related_file_size > 40000000) {
                $msg = "<span class='alert alert-warning d-block'>Upload Less Than 5 Mb(image<5)</span>";
                return $msg;
            } elseif (in_array($ext, $allow_format) && in_array($related_ext, $related_allow_format)) {
                $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
                $uploaded_image = "../assets/img/product/" . $unique_image;

                $related_unique_image = substr(md5(time()), 0, 8) . '.' . $related_ext;
                $related_uploaded_image = "../assets/img/product/" . $related_unique_image;

                move_uploaded_file($file_tmp, $uploaded_image);
                move_uploaded_file($related_file_tmp, $related_uploaded_image);

                $query = "UPDATE product_table SET 
                    productName = '$productName',
                    catId = '$catId',
                    brandid = '$brandid',
                    price = '$price',
                    type = '$type',
                    productCode = '$productCode',
                    body = '$body',
                    image = '$unique_image',
                    relatedImage = '$related_unique_image' WHERE productId = '$id';";
                $update_query = $this->db->update($query);
                if ($update_query) {
                    $msg = "<span class='alert alert-success d-block'><strong>Update Product Successfully</strong> Successful..!</span>";
                    return $msg;
                } else {
                    $msg = "<span class='alert alert-danger d-block'>
            Oh snap! Error...!</span>";
                    return $msg;
                }
            }
        } else {
            $query = "UPDATE product_table SET 
                    productName = '$productName',
                    catId = '$catId',
                    brandid = '$brandid',
                    price = '$price',
                    type = '$type',
                    productCode = '$productCode',
                    body = '$body' WHERE productId = '$id';";
            $update_query = $this->db->update($query);
            if ($update_query) {
                $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
                return $msg;
            } else {
                $msg = "<span class='alert alert-danger d-block'>
            Oh snap! Error...!</span>";
                return $msg;
            }
        }
    }

    public function delCatById($id)
    {
        $query = "SELECT * FROM product_table WHERE productId = '$id'";
        $getData = $this->db->select($query);
        if($getData){
            while($delImg = $getData->fetch_assoc()){
                $delLink = "../assets/img/product/".$delImg['image'];
                unlink($delLink);
            }
        }
        $delQuery = "DELETE FROM product_table WHERE productId = '$id'";
        $deleteCat = $this->db->delete($delQuery);
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
