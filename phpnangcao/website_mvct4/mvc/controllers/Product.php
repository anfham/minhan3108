<?php
class Product extends Controller {
    public function getShow() {
        if (isset($_SESSION['user_type'])) {
            
        } else {
            // Gửi thông báo khi chưa đăng nhập
            $_SESSION['message'] = ["Vui lòng đăng nhập để mua hàng."]; 
        }
        $obj = $this->model("AdProductModel");
        $productList = $obj->getAdProduct();
        $this->view("HomeView", ["page" => "ProductView", "productList" => $productList]);
    }
    public function search() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Nhận dữ liệu từ form
            $keyword = isset($_POST['txt_keyword']) ? $_POST['txt_keyword'] : '';
            $status = isset($_POST['txt_status']) ? $_POST['txt_status'] : '';
            $minPrice = isset($_POST['txt_min_price']) && $_POST['txt_min_price'] !== '' ? (int)$_POST['txt_min_price'] : null;
            $maxPrice = isset($_POST['txt_max_price']) && $_POST['txt_max_price'] !== '' ? (int)$_POST['txt_max_price'] : null;
    
            // Gọi model để tìm kiếm sản phẩm
            $obj = $this->model("AdProductModel");
            $productList = $obj->searchAdProductByPrice($keyword, $minPrice, $maxPrice, $status);
    
            // Gửi dữ liệu qua view
            $this->view("HomeView", ["page" => "ProductView", "productList" => $productList]);
        }
    }
}