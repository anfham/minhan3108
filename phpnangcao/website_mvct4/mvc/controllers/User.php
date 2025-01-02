<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../website_mvct4/Login/"); 
}
class User extends Controller{
    public function getshow(){
        $obj=$this->model("LoginModel");
        $data=$obj->getAccount();
        $this -> view("Manager_View",['page'=>"UserView", "users"=>$data]);
    }
    public function update($id){
        $obj=$this->model("LoginModel");
        $userlist=$obj->getUserID($id);
        $name =isset($_POST["txt_name"])?$_POST["txt_name"]:$userlist["name"];
        $email =isset($_POST["txt_email"])?$_POST["txt_email"]:$userlist["email"];
        $password =isset($_POST["txt_password"])?$_POST["txt_password"]:$userlist["password"];
        $user_type =isset($_POST["txt_user_type"])?$_POST["txt_user_type"]:$userlist["user_type"];
        $phone =isset($_POST["txt_phone"])?$_POST["txt_phone"]:$userlist["phone"];
        $sex =isset($_POST["txt_sex"])?$_POST["txt_sex"]:$userlist["sex"];
        $address =isset($_POST["txt_address"])?$_POST["txt_address"]:$userlist["address"];
        //var_dump($userlist);
        $this->view("Manager_View",["page"=>"UserView_edit","users"=>$userlist]);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $obj->updateUser($id,$name,$email,$password,$user_type,$phone,$sex,$address);
            header("location:..");
            exit();
        }
    } 
    public function delete($id){
        $obj=$this->model("LoginModel");
        $obj->deleteUser($id);
        header("location:..");
        exit();
    } 
    public function insert() {
        $obj = $this->model("LoginModel");
    
        $maxID = $obj->getMaxUserID();
        $id = $maxID ? $maxID + 1 : 1;
    
        $name = isset($_POST["txt_name"]) ? $_POST["txt_name"] : "";
        $email = isset($_POST["txt_email"]) ? str_replace(" ", "", $_POST["txt_email"]) : "";
        $password = isset($_POST["txt_password"]) ? str_replace(" ", "", $_POST["txt_password"]) : "";
        $user_type = isset($_POST["txt_user_type"]) ? str_replace(" ", "", $_POST["txt_user_type"]) : "";
        $phone = isset($_POST["txt_phone"]) ? $_POST["txt_phone"] : "";
        $sex = isset($_POST["txt_sex"]) ? $_POST["txt_sex"] : "";
        $address = isset($_POST["txt_address"]) ? $_POST["txt_address"] : "";
    
        $user_create_date = date("Y-m-d");
        $buy_state = "havent";
    
        if ($obj->checkEmailExists($email)) {
            $_SESSION['message'][] = "Email đã tồn tại!";
            header("Location: ./User/insert"); 
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_SESSION['message'])) {
            $obj->insertUser2($id, $name, $email, $password, $user_type, $phone, $sex, $address, $user_create_date, $buy_state);
            $_SESSION['message'][] = "Thêm mới người dùng thành công!";
            header("Location: ./User");
            exit();
        }
    
        $users = $obj->getAccount();
        $this->view("Manager_View", ["page" => "UserView_insert", "users" => $users]);
    }
    public function search() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $keyword = isset($_POST['txt_keyword']) ? $_POST['txt_keyword'] : '';
            $obj = $this->model("LoginModel");
            $data = $obj->searchUser($keyword); 
            $this->view("Manager_View", ["page" => "UserView", "users" => $data]);
        }
    }
}