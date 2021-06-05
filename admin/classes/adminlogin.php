<?php
include '../lib/session.php';
Session::init();
include_once '../lib/database.php';
include_once '../helpers/format.php';


class adminLogin
{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }

    public function adminLogin($admin, $pass)
    {

        $admin = $this->format->validation($_POST['email']);
        $pass = $this->format->validation(md5($_POST['pass']));

        $admin = mysqli_real_escape_string($this->db->link, $admin);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        $query = "SELECT * FROM admin_panel WHERE email = '$admin' AND pass = '$pass'";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = mysqli_fetch_array($result);
            Session::set("login", true);
            Session::set("userid", $value['id']);
            Session::set("username", $value['username']);
            Session::set("email", $value['email']);
            Session::set("name", $value['name']);
            header("Location: dashboard.php");
        } else {
            $_SESSION['failed'] =  "Email or Password Doesn't Match..!!";
            return $_SESSION['failed'];
        }
    }
}
