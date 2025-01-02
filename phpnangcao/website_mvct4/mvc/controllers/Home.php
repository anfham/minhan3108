<?php
class Home extends Controller {
    public function getShow() {
        if (isset($_SESSION['user_type'])) {
            
        } else {
            // Gửi thông báo khi chưa đăng nhập
            $_SESSION['message'] = ["Vui lòng đăng nhập để mua hàng."]; 
        }
        $obj = $this->model("AdProductModel");
        $productList = $obj->getAdProduct();
        $this->view("HomeView", ["page" => "HomePage", "productList" => $productList]);
    }
}
