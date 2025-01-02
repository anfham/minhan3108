<?php
class Register extends Controller{
    public function getShow(){
        $this -> view("View",['page'=>"RegisterView"]);
    }
    public function insert(){
        $obj=$this->model("LoginModel");
        $message = [];

        $maxID = $obj->getMaxUserID();
        $id = $maxID ? $maxID + 1 : 1;

        $name =isset($_POST["txt_name"])?$_POST["txt_name"]:"";
        $email =isset($_POST["txt_email"])?$_POST["txt_email"]:"";
        $password =isset($_POST["txt_password"])?$_POST["txt_password"]:"";
        $cpassword =isset($_POST["txt_cpassword"])?$_POST["txt_cpassword"]:"";
        $user_type = "user";
        $user_create_date = date("Y-m-d");
        $buy_state = 'havent';

        $existingUser = $obj->getEmail($email);
        if ($existingUser) {
            $message[] = "Tài khoản đã tồn tại!";
        }

        if($password !== $cpassword){
            $message[] = "Mật khẩu không trùng khớp!";
        }

        if(empty($message)){
        $obj->insertUser($id, $name, $email, $password, $user_type, $user_create_date, $buy_state);
        header("location: ../Login/");
        exit();
        }
        $this->view("View", ['page' => "LoginView", 'message' => $message]);
    }  
    public function insertAdmin(){
        $obj=$this->model("LoginModel");
        $message = [];

        $maxID = $obj->getMaxUserID();
        $id = $maxID ? $maxID + 1 : 1;

        $name =isset($_POST["txt_name"])?$_POST["txt_name"]:"";
        $email =isset($_POST["txt_email"])?$_POST["txt_email"]:"";
        $password =isset($_POST["txt_password"])?$_POST["txt_password"]:"";
        $cpassword =isset($_POST["txt_cpassword"])?$_POST["txt_cpassword"]:"";
        $user_type = "admin";
        $user_create_date = date("Y-m-d");

        $existingUser = $obj->getEmail($email);
        if ($existingUser) {
            $message[] = "Tài khoản đã tồn tại!";
        }

        if($password !== $cpassword){
            $message[] = "Mật khẩu không trùng khớp!";
        }

        if(empty($message)){
        $obj->insertUser($id, $name, $email, $password, $user_type, $user_create_date);
        header("location: ../Login/");
        exit();
        }
        
        $this->view("View", ['page' => "RegisterView", 'message' => $message]);
    }  
}