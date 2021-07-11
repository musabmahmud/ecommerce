<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';


class User
{
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
        if ($mailCheck == true) {
            $msg = "<span class='text-white'>Already created a account.<br>Try to login..!</span>";
            return $msg;
        } 
        elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,15}$/', $pass)) {
            $msg = "<span class='text-white'>Password Must Be Uppercase Lowercase and More than 6 Characters</span>";
            return $msg;
        } 
        else {
            $query = "INSERT INTO customer_login(cusName,email,pass) VALUES('$cusName','$email','$pass')";
            $tablequery = "INSERT INTO customer_table(cusName,email) VALUES('$cusName','$email')";
            $inserted_row = $this->db->insert($query);
            $inserted_Tablerow = $this->db->insert($tablequery);
            if ($inserted_row) {
                $msg = "<span class='text-white'>Successfully Registered..!</span>";
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
        if ($UserCheck == true) {
            $value = $UserCheck->fetch_assoc();
            Session::set("cuslogin", true);
            Session::set("cusId", $value['cusId']);
            Session::set("email", $value['email']);
            Session::set("cusName", $value['cusName']);
            echo "<script>window.location = 'index.php'</script>;";
        } else {
            $msg = "<span class='text-white'>Already created a account.<br>Try to login..!</span>";
            return $msg;
        }
    }
    public function profileUpdate($data,$email)
    {
        $cusName = $this->format->validation($_POST['cusName']);
        $address = $this->format->validation($_POST['address']);
        $city = $this->format->validation($_POST['city']);
        $country = $this->format->validation($_POST['country']);
        $phone = $this->format->validation($_POST['phone']);
        $zip = $this->format->validation($_POST['zip']);

        $email = mysqli_real_escape_string($this->db->link, $email);
        $cusName = mysqli_real_escape_string($this->db->link, $cusName);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $city = mysqli_real_escape_string($this->db->link, $city);
        $country = mysqli_real_escape_string($this->db->link, $country);
        $zip = mysqli_real_escape_string($this->db->link, $zip);
        $phone = mysqli_real_escape_string($this->db->link, $phone);

        $query = "UPDATE customer_table SET 
                    cusName = '$cusName',
                    address = '$address',
                    city = '$city',
                    country = '$country',
                    zip = '$zip',
                    phone = '$phone' WHERE
                    email = '$email'";
        $update_query = $this->db->update($query);
        if ($update_query) {
            $msg = "<span><strong>Update Product Successfully</strong> Successful..!</span>";
            echo "<meta http-equiv='refresh' content='0;URL=?live=live'/>";
            return $msg;
        } else {
            $msg = "<span>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
    public function CusProfile($email){
        $email = mysqli_real_escape_string($this->db->link, $email);

        $query = "SELECT * FROM customer_table WHERE email = '$email'";
        $SelectQuery = $this->db->select($query);
        if($SelectQuery){
            return $SelectQuery;
        }
        else{
            $msg = "<span class='alert alert-danger'>
            Oh snap! Error...!</span>";
            return $msg;
        }
    }
}
