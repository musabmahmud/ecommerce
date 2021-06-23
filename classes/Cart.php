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
        $price = $result['price'] * $quantity;
        $image = $result['image'];
        $productCode = $result['productCode'];

        $query = "INSERT INTO product_cart(sId, productId, productName, price, quantity,image,productCode) VALUES('$sId', '$productId','$productName', '$price', '$quantity', '$image', '$productCode')";
        $inserted_row = $this->db->insert($query);
        if($inserted_row){
            echo "<script>window.location = 'cart.php'</script>;";
        }
        else{
            echo "<script>window.location = 'shop.php'</script>;";
        }
    }

    
}
