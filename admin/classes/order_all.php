<?php

include_once '../lib/database.php';
include_once '../helpers/format.php';


class Order{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }
    public function getOrderAll(){
        $query = "SELECT * FROM product_order WHERE status = 0 ORDER BY orderid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getOrderDetails($email,$date){
        $query = "SELECT * FROM product_purchased WHERE email = '$email' AND date = '$date'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delivered($id){
        $query = "UPDATE product_order SET status = 1 WHERE orderid = '$id'";
        $update_query = $this->db->update($query);
            if ($update_query) {
                $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
                return $msg;
            } else {
                $msg = "<span class='alert alert-danger d-block'>Oh snap! Error...!</span>";
                return $msg;
            }
    }
    
    public function getDeliverOrder(){
        $query = "SELECT * FROM product_order WHERE status = 1 ORDER BY orderid DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function delOrderById($id){
        $query = "DELETE FROM product_order WHERE orderid = '$id'";
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