<?php
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location: ../Home"); 
}
class Order extends Controller{
    public function getShow(){
        $this -> view("HomeView",['page'=>"OrderView"]);
    }
    public function Addtocart($masp) {
        $obj = $this->model("AdProductModel");
        $data = $obj->getAdProductID($masp);
        $message = []; 
    
        if (isset($_SESSION['cart'][$masp])) {
            $_SESSION['cart'][$masp]['qty'] += 1;
            $message[] = "Cập nhật số lượng sản phẩm thành công!";
        } else {
            $_SESSION['cart'][$masp] = [
                'qty' => 1,
                'masp' => $data['masp'],
                'tensp' => $data['tensp'],
                'hinhanh' => $data['hinhanh'],
                'giaxuat' => $data['giaxuat'],
                'khuyenmai' => $data['khuyenmai'],
            ];
            $message[] = "Thêm sản phẩm vào giỏ hàng thành công!";
        }
    
        $_SESSION['message'] = $message;
    
        header("Location: ../");
        exit();
    }
    
    public function updateCart() {
        $message = []; 
    
        if (isset($_POST['delete'])) {
            $masp = $_POST['delete'];
            unset($_SESSION['cart'][$masp]);
            $message[] = "Đã xóa sản phẩm khỏi giỏ hàng.";
        }
    
        if (isset($_POST['update'])) {
            foreach ($_POST['qty'] as $masp => $qty) {
                if ($qty > 0) {
                    $_SESSION['cart'][$masp]['qty'] = $qty; 
                }
            }
            $message[] = "Giỏ hàng đã được cập nhật thành công!";
        }
    
        // Lưu thông báo vào session
        $_SESSION['message'] = $message;
    
        header("Location: ../Order/cart");
        exit();
    }   
}