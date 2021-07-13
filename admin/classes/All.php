<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';



class AllItem{
    private $db;
    private $format;
    public function __construct()
    {
        $this->db = new Database();
        $this->format = new Format();
    }

    public function InsertSlider($data,$files){
        $heading = mysqli_real_escape_string($this->db->link, $data['heading']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);

        $file_name_bg = $files['image_bg']['name'];
        $file_size_bg = $files['image_bg']['size'];
        $file_tmp_bg = $files['image_bg']['tmp_name'];
        $explode_bg = explode('.', $file_name_bg);
        $ext_bg = strtolower(end($explode_bg));


        $file_name_1 = $files['image_1']['name'];
        $file_size_1 = $files['image_1']['size'];
        $file_tmp_1 = $files['image_1']['tmp_name'];
        $explode_1 = explode('.', $file_name_1);
        $ext_1 = strtolower(end($explode_1));
        
        $file_name_2 = $files['image_2']['name'];
        $file_size_2 = $files['image_2']['size'];
        $file_tmp_2 = $files['image_2']['tmp_name'];
        $explode_2 = explode('.', $file_name_2);
        $ext_2 = strtolower(end($explode_2));
        
        $file_name_3 = $files['image_3']['name'];
        $file_size_3 = $files['image_3']['size'];
        $file_tmp_3 = $files['image_3']['tmp_name'];
        $explode_3 = explode('.', $file_name_3);
        $ext_3 = strtolower(end($explode_3));

        $file_name_4 = $files['image_4']['name'];
        $file_size_4 = $files['image_4']['size'];
        $file_tmp_4 = $files['image_4']['tmp_name'];
        $explode_4 = explode('.', $file_name_4);
        $ext_4 = strtolower(end($explode_4));
        
        $allow_format = ['jpg', 'png', 'jpeg'];

        if (empty($file_name_bg) || empty($file_name_1) || empty($file_name_2) || empty($file_name_3) || empty($file_name_4)){
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        }
        elseif (in_array($ext_1, $allow_format) && in_array($ext_2, $allow_format) && in_array($ext_3, $allow_format) && in_array($ext_4, $allow_format)) {

            $unique_image_bg = substr(md5(time()), 0, 10) . '.' . $ext_bg;
            $uploaded_image_bg = "../assets/img/slider/" . $unique_image_bg;
            move_uploaded_file($file_tmp_bg, $uploaded_image_bg);


            $unique_image_1 = substr(md5(time()), 0, 6) . '.' . $ext_1;
            $uploaded_image_1 = "../assets/img/slider/" . $unique_image_1;
            move_uploaded_file($file_tmp_1, $uploaded_image_1);

            $unique_image_2 = substr(md5(time()), 0, 7) . '.' . $ext_2;
            $uploaded_image_2 = "../assets/img/slider/" . $unique_image_2;
            move_uploaded_file($file_tmp_2, $uploaded_image_2);

            $unique_image_3 = substr(md5(time()), 0, 8) . '.' . $ext_3;
            $uploaded_image_3 = "../assets/img/slider/" . $unique_image_3;
            move_uploaded_file($file_tmp_3, $uploaded_image_3);

            $unique_image_4 = substr(md5(time()), 0, 9) . '.' . $ext_4;
            $uploaded_image_4 = "../assets/img/slider/" . $unique_image_4;
            move_uploaded_file($file_tmp_4, $uploaded_image_4);


            $query = "INSERT INTO slider(image_bg,image_1,image_2,image_3,image_4,heading,body) VALUES('$unique_image_bg','$unique_image_1','$unique_image_2','$unique_image_3','$unique_image_4','$heading','$body')";
            $sliderInsert = $this->db->insert($query);
            if ($sliderInsert) {
                $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
                return $msg;
            } else {
                $msg = "<span class='alert alert-danger d-block'>
                    Oh snap! Error...!</span>";
                return $msg;
            }
        } 
        else {
            $msg = "<span class='alert alert-warning d-block'>Please Upload JPG/PNG/JPEG</span>";
            return $msg;
        }
    }

    public function getSliderUpdate($data,$files){
        
        $id = mysqli_real_escape_string($this->db->link, $data['sliderId']);
        $heading = mysqli_real_escape_string($this->db->link, $data['heading']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);

        $file_name_bg = $files['image_bg']['name'];
        $file_size_bg = $files['image_bg']['size'];
        $file_tmp_bg = $files['image_bg']['tmp_name'];
        $explode_bg = explode('.', $file_name_bg);
        $ext_bg = strtolower(end($explode_bg));


        $file_name_1 = $files['image_1']['name'];
        $file_size_1 = $files['image_1']['size'];
        $file_tmp_1 = $files['image_1']['tmp_name'];
        $explode_1 = explode('.', $file_name_1);
        $ext_1 = strtolower(end($explode_1));
        
        $file_name_2 = $files['image_2']['name'];
        $file_size_2 = $files['image_2']['size'];
        $file_tmp_2 = $files['image_2']['tmp_name'];
        $explode_2 = explode('.', $file_name_2);
        $ext_2 = strtolower(end($explode_2));
        
        $file_name_3 = $files['image_3']['name'];
        $file_size_3 = $files['image_3']['size'];
        $file_tmp_3 = $files['image_3']['tmp_name'];
        $explode_3 = explode('.', $file_name_3);
        $ext_3 = strtolower(end($explode_3));

        $file_name_4 = $files['image_4']['name'];
        $file_size_4 = $files['image_4']['size'];
        $file_tmp_4 = $files['image_4']['tmp_name'];
        $explode_4 = explode('.', $file_name_4);
        $ext_4 = strtolower(end($explode_4));
        
        $allow_format = ['jpg', 'png', 'jpeg'];

        if (empty($file_name_bg) || empty($file_name_1) || empty($file_name_2) || empty($file_name_3) || empty($file_name_4)){
            $msg = "<span class='alert alert-warning d-block'>Field Must Not Be Empty</span>";
            return $msg;
        }
        elseif (in_array($ext_1, $allow_format) && in_array($ext_2, $allow_format) && in_array($ext_3, $allow_format) && in_array($ext_4, $allow_format)) {

            $unique_image_bg = substr(md5(time()), 0, 10) . '.' . $ext_bg;
            $uploaded_image_bg = "../assets/img/slider/" . $unique_image_bg;
            move_uploaded_file($file_tmp_bg, $uploaded_image_bg);


            $unique_image_1 = substr(md5(time()), 0, 6) . '.' . $ext_1;
            $uploaded_image_1 = "../assets/img/slider/" . $unique_image_1;
            move_uploaded_file($file_tmp_1, $uploaded_image_1);

            $unique_image_2 = substr(md5(time()), 0, 7) . '.' . $ext_2;
            $uploaded_image_2 = "../assets/img/slider/" . $unique_image_2;
            move_uploaded_file($file_tmp_2, $uploaded_image_2);

            $unique_image_3 = substr(md5(time()), 0, 8) . '.' . $ext_3;
            $uploaded_image_3 = "../assets/img/slider/" . $unique_image_3;
            move_uploaded_file($file_tmp_3, $uploaded_image_3);

            $unique_image_4 = substr(md5(time()), 0, 9) . '.' . $ext_4;
            $uploaded_image_4 = "../assets/img/slider/" . $unique_image_4;
            move_uploaded_file($file_tmp_4, $uploaded_image_4);


            $query = "UPDATE slider SET 
            image_bg = '$unique_image_bg',
            image_1 = '$unique_image_1',
            image_2 = '$unique_image_2',
            image_3 = '$unique_image_3',
            image_4 = '$unique_image_4',
            heading = '$heading',
            body = '$body'
            WHERE slider = '$id'";
            $sliderUpdate = $this->db->update($query);
            if ($sliderUpdate) {
                $msg = "<span class='alert alert-success d-block'><strong>Well done!</strong> Successful..!</span>";
                return $msg;
            } else {
                $msg = "<span class='alert alert-danger d-block'>
                    Oh snap! Error...!</span>";
                return $msg;
            }
        }
        else{
            $msg = "<span class='alert alert-danger d-block'>
                Oh snap! Error...!</span>";
            return $msg;
        }
    }

    public function getSlider(){
        $query = "SELECT * FROM slider";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSliderById($id){
        $query = "SELECT * FROM slider WHERE sliderId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function sliderdelId($id){
        $query = "DELETE FROM slider WHERE sliderId = '$id'";
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