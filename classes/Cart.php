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
    public function cartDetails()
    {
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateTocart($id, $quantity)
    {
        $quantity = $this->format->validation($_POST['quantity']);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $query = "UPDATE product_cart SET quantity = '$quantity' WHERE cartId = '$cartId' AND sId = '$sId'";
        $update_query = $this->db->update($query);
        if ($update_query) {
            $msg = "<span class='text-white'>Update Successfully..!</span>";
            echo "<script>window.location = 'cart.php'</script>;";
            return $msg;
        } else {
            $msg = "<span'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
    public function delCatById($id)
    {
        $deletId = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $query = "DELETE FROM product_cart WHERE cartId = '$deletId' AND sId = '$sId'";
        $delData = $this->db->delete($query);
        if ($delData) {
            $msg = "<span class='text-white'>Delete Successfully..!</span>";
            return $msg;
        } else {
            $msg = "<span'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
    public function totalCartNum()
    {
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function cartOption()
    {
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function cartCheck()
    {
        $sId = session_id();
        $query = "SELECT * FROM product_cart WHERE sId = '$sId' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function delCustomerCart()
    {
        $sId = session_id();

        $query = "DELETE FROM product_cart WHERE sId = '$sId'";
        $delData = $this->db->delete($query);
        if ($delData) {
            return $delData;
        } else {
            $msg = "<span'>Oh snap! Error...!</span>";
            return $msg;
        }
    }

    public function getOrder($data)
    {
        $sId = session_id();

        $email = $this->format->validation($_POST['email']);
        $cusName = $this->format->validation($_POST['cusName']);
        $address = $this->format->validation($_POST['address']);
        $city = $this->format->validation($_POST['city']);
        $country = $this->format->validation($_POST['country']);
        $phone = $this->format->validation($_POST['phone']);
        $zip = $this->format->validation($_POST['zip']);
        $ordernote = $this->format->validation($_POST['ordernote']);
        $paymentmethod = $this->format->validation($_POST['paymentmethod']);


        $email = mysqli_real_escape_string($this->db->link, $email);
        $cusName = mysqli_real_escape_string($this->db->link, $cusName);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $city = mysqli_real_escape_string($this->db->link, $city);
        $country = mysqli_real_escape_string($this->db->link, $country);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $zip = mysqli_real_escape_string($this->db->link, $zip);
        $ordernote = mysqli_real_escape_string($this->db->link, $ordernote);
        $paymentmethod = mysqli_real_escape_string($this->db->link, $paymentmethod);

        $checkLogin = Session::get("email");
        if($email == $checkLogin){
        $CusDeQuery = "UPDATE customer_table SET 
                    cusName = '$cusName',
                    address = '$address',
                    city = '$city',
                    country = '$country',
                    zip = '$zip',
                    phone = '$phone' WHERE
                    email = '$email'";
        $cusDetails = $this->db->update($CusDeQuery);}
        else{
            $CusDeQuery = "INSERT INTO customer_table(cusName, address, city, country, zip,phone,email)
             VALUES('$cusName', '$address','$city', '$country', '$zip', '$phone', '$email')";
            $cusDetails = $this->db->insert($CusDeQuery);
            Session::set("email", $email);
        }
        $cartDetailsquery = "SELECT * FROM product_cart WHERE sId = '$sId'";
        $cartDetails = $this->db->select($cartDetailsquery);

        $sum = 0;
        $total = 0;
        $i = 0;
        while ($cartResult = $cartDetails->fetch_assoc()) {
            $i++;
            $productId =  $cartResult['productId'];
            $productName =  $cartResult['productName'];
            $image =  $cartResult['image'];
            $quantity =  $cartResult['quantity'];
            $price =  $cartResult['price'];
            $productCode =  $cartResult['productCode'];

            $insert_purchased = "INSERT INTO product_purchased(productId, email, productName, price, quantity,image,productCode) VALUES('$productId','$email','$productName', '$price', '$quantity', '$image', '$productCode')";
            $inserted_purchased_row = $this->db->insert($insert_purchased);

            $sum = $quantity * $price;
            $total = $total + $sum;
        }
        $vat = $total * 0.1;
        $total = $total + $vat;


        $orderDetails = "INSERT INTO product_order(email, payment, total, ordernote) VALUES('$email','$paymentmethod','$total','$ordernote')";
        $inserted_Order = $this->db->insert($orderDetails);
        if ($inserted_Order) {
            $DeletCartquery = "DELETE FROM product_cart WHERE sId = '$sId'";
            $delData = $this->db->delete($DeletCartquery);

            echo "<script>window.location = 'myaccount.php?success=Purchased Product Successfully......!'</script>;";
        } else {
            $msg = "<span>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
    public function orderDetails($email)
    {
        $orderquery = "SELECT * FROM product_order WHERE email = '$email'";
        $getOrderDetails = $this->db->select($orderquery);
        if($getOrderDetails){
            return $getOrderDetails;
        }else {
            $msg = "<span> Oh snap! Error...!</span>";
            return $msg;
        }
    }
}
