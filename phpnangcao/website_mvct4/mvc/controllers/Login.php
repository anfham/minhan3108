<?php
class Login extends Controller{
    public function getShow(){
        $this -> view("View",['page'=>"LoginView"]);
    }
    public function authenticate() { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $message = []; 
            try {
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                $obj = $this->model("LoginModel");
                $user = $obj->login($email, $password);
    
                if ($user) {
                    // Nếu không phải admin, tăng `access_lvl`
                    if ($user['user_type'] !== 'admin') {
                        $newAccessLevel = $user['access_lvl'] + 1;
                        $obj->updateAccessLevel($user['id'], $newAccessLevel);
                    }
                    // Kiểm tra user_type để chuyển hướng
                    if ($user['user_type'] === 'admin') {
                        $_SESSION['loggedin'] = true; 
                        $_SESSION['admin_id'] = $user['id'];
                        $_SESSION['admin_name'] = $user['name'];
                        $_SESSION['admin_type'] = $user['user_type'];
                        header("Location: ../Admin");  // Chuyển hướng về trang admin
                    } else {
                        $_SESSION['loggedin'] = true; 
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_name'] = $user['name'];
                        $_SESSION['user_type'] = $user['user_type'];
                        header("Location: ../Home");   // Chuyển hướng về trang home
                    }
                } else {
                    $message[] = "Email hoặc mật khẩu không đúng.";
                }
            } catch (Exception $e) {
                $message[] = $e->getMessage();
            }
            if (!empty($message)) {
                $this->view("View", ['page' => "LoginView", 'message' => $message]);
            }
        }
    }    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../Home");  
    }
}