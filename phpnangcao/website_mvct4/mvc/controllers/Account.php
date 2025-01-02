<?php
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location: ../Home"); 
}
class Account extends Controller {
    public function getShow() {
        $userModel = $this->model("UserModel");
        $user_id = $_SESSION['user_id'];
        $data = $userModel->getUserID($user_id); 
        $this->view("HomeView", ["page" => "AccountView", "users" => $data]); 
    }

    public function update() {
        $userModel = $this->model("UserModel");
        $user_id = $_SESSION['user_id'];  // Lấy user ID từ session
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Lấy dữ liệu từ form
            $name = $_POST["txt_name"];
            $email = $_POST["txt_email"];
            $password = $_POST["txt_password"];
            $phone = $_POST["txt_phone"];
            $sex = $_POST["txt_sex"];
            $address = $_POST["txt_address"];

            // Gọi model để cập nhật thông tin
            $userModel->updateUser($user_id, $name, $email, $password, $phone, $sex, $address);

            // Chuyển hướng về trang tài khoản
            header("Location: ../Account/getShow");
            exit();
        }
    }
    
}
