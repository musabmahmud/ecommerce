<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';


class Cart
{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
    public function addTocart($quantity, $id)
    {
        $quantity = $this->format->validation($_POST['quantity']);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $productId = mysqli_real_escape_string($this->db->link, $id);
        $sId       = session_id();


        $squery = "SELECT * FROM product_table WHERE productId = '$productId'";
        $result = $this->db->select($squery)->fetch_assoc();

        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];
        $productCode = $result['productCode'];

        $checkquery = "SELECT * FROM product_cart WHERE productId = '$productId' AND sId = '$sId'";
        $checkresult = $this->db->select($checkquery);
        if ($checkresult) {
            $msg = "<span class='text-white'>Already Added To Cart..!</span>";
            return $msg;
        } else {

            $query = "INSERT INTO product_cart(sId, productId, productName, price, quantity,image,productCode) VALUES('$sId', '$productId','$productName', '$price', '$quantity', '$image', '$productCode')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                echo "<script>window.location = 'cart.php'</script>;";
            } else {
                echo "<script>window.location = 'shop.php'</script>;";
            }
        }
    }
    public function cartDetails(){
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateTocart($id,$quantity){
        $quantity = $this->format->validation($_POST['quantity']);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $query = "UPDATE product_cart SET quantity = '$quantity' WHERE cartId = '$cartId' AND sId = '$sId'";
        $update_query = $this->db->update($query);
        if($update_query){
            $msg = "<span class='text-white'>Update Successfully..!</span>";
            echo "<script>window.location = 'cart.php'</script>;";
            return $msg;
        }
        else{
            $msg = "<span'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
    public function delCatById($id){
        $deletId = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();
        
        $query = "DELETE FROM product_cart WHERE cartId = '$deletId' AND sId = '$sId'";
        $delData = $this->db->delete($query);
        if($delData){
            $msg = "<span class='text-white'>Delete Successfully..!</span>";
            return $msg;
        }
        else{
            $msg = "<span'>
            Oh snap! Error...!</span>";
            return $msg;
        }

    }
    public function totalCartNum(){
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function cartOption(){
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delCustomerCart(){
        $sId = session_id();
        
        $query = "DELETE FROM product_cart WHERE sId = '$sId'";
        $delData = $this->db->delete($query);
        if($delData){
            return $delData;
        }
        else{
            $msg = "<span'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
}
