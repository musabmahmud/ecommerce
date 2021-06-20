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


        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_tmp = $files['image']['tmp_name'];
        $explode = explode('.', $file_name);
        $ext = strtolower(end($explode));
        $allow_format = ['jpg', 'png', 'jpeg'];

        if ($productName == "" || $catId == "" || $brandid == "" || $price == "" || $body == "" || empty($file_name)) {
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        } elseif ($file_size > 40000000) {
            $msg = "<span class='alert alert-warning d-block'>Upload Less Than 5 Mb(image<5)</span>";
            return $msg;
        } elseif (in_array($ext, $allow_format)) {
            $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
            $uploaded_image = "assets/img/" . $unique_image;

            move_uploaded_file($file_tmp, $uploaded_image);

            $query = "INSERT INTO product_table(productName,catId,brandid,price,productCode,type,body,image) VALUES('$productName','$catId','$brandid','$price','$productCode','$type','$body','$unique_image')";
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

        if ($productName == "" || $catId == "" || $brandid == "" || $price == "" || $body == "") {
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        } elseif (!empty($file_name = $files['image']['name'])) {

            $file_size = $files['image']['size'];
            $file_tmp = $files['image']['tmp_name'];
            $explode = explode('.', $file_name);
            $ext = strtolower(end($explode));
            $allow_format = ['jpg', 'png', 'jpeg'];
            if ($file_size > 40000000) {
                $msg = "<span class='alert alert-warning d-block'>Upload Less Than 5 Mb(image<5)</span>";
                return $msg;
            } elseif (in_array($ext, $allow_format)) {
                $unique_image = substr(md5(time()), 0, 10) . '.' . $ext;
                $uploaded_image = "assets/img/" . $unique_image;

                move_uploaded_file($file_tmp, $uploaded_image);

                $query = "UPDATE product_table SET 
                    productName = '$productName',
                    catId = '$catId',
                    brandid = '$brandid',
                    price = '$price',
                    type = '$type',
                    productCode = '$productCode',
                    body = '$body',
                    image = '$unique_image' WHERE productId = '$id';";
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
}
