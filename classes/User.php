<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';


class User{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
    public function customer_register($data)
    {
        $cusName = $this->format->validation($_POST['cusName']);
        $cusName = mysqli_real_escape_string($this->db->link, $cusName);

        $email = $this->format->validation($_POST['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);
        
        $pass = $this->format->validation($_POST['pass']);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        $mailquery = "SELECT * FROM customer_login WHERE email = '$email' LIMIT 1";
        $mailCheck = $this->db->select($mailquery);
        if($mailCheck == true){
            $msg = "<span class='text-white'>Already created a account.<br>Try to login..!</span>";
            return $msg;
        }
        else{
            $query = "INSERT INTO customer_login(cusName,email,pass) VALUES('$cusName','$email','$pass')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='text-success'>Successfully Registered..!</span>";
                return $msg;
            } else {
                $msg = "<span class='text-danger'>Failed..!</span>";
                return $msg;
            }
        }
        
    }
    public function customer_login($data)
    {
        $email = $this->format->validation($_POST['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);
        
        $pass = $this->format->validation($_POST['pass']);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        $Userquery = "SELECT * FROM customer_login WHERE email = '$email' AND pass = '$pass'";
        $UserCheck = $this->db->select($Userquery);
        if($UserCheck == true){
            $value = $UserCheck->fetch_assoc();
            Session::set("cuslogin", true);
            Session::set("cusId", $value['cusId']);
            Session::set("email", $value['email']);
            Session::set("cusName", $value['cusName']);
            echo "<script>window.location = 'index.php'</script>;";
        }
        else{
            $msg = "<span class='text-white'>Already created a account.<br>Try to login..!</span>";
            return $msg;
        }
        
    }

}