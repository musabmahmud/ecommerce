<?php include '../../lib/session.php';
    Session::checkSession();
    include_once '../../lib/database.php';
    include_once '../../helpers/format.php';
?>
<?php
class adminLogin{

    private $db;
    private $format;
    public function __construct(){
        $this->db = new Database();
        $this->format = new Format();
    }


    public function adminLogin($admin,$pass){
        $admin = $this->format->validation($admin);
        $pass = $this->format->validation($pass);

        $admin = mysqli_real_escape_string($this->db->link,$admin);
        $pass  = mysqli_real_escape_string($this->db->link,$pass);
   
        if(empty($admin) || empty($pass)){
            $_SESSION['invalid'] = "USERNAME OR PASSWORD Doesn't Match..!!";
            return $_SESSION['invalid'];
        }
        else{
            $query = "SELECT * FROM admin_panel WHERE email = 'admin' AND pass = '$pass'";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::checkSession("login", true);
                Session::checkSession("id", $result['id']);
                Session::checkSession("email", $result['email']);
                Session::checkSession("username", $result['username']);
                Session::checkSession("name", $result['name']);
                Session::checkSession("level", $result['level']);
                Session::checkSession("status", $result['status']);
                header("Location: dashboard.php");
            }
        }











    }
}






?>