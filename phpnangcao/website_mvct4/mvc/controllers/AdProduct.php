<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class AdProduct extends Controller{
    function getShow(){
        $obj=$this->model("AdProductModel");
        $data=$obj->getAdProduct();
        $this->view("Manager_View",["page"=>"AdProductView","product"=>$data]);
    }
    public function insert() {
        $obj = $this->model("AdProductModel");
        $obj2 = $this->model("AdProductTypeModel");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ma_loaisp = isset($_POST["txt_maloaisp"]) ? $_POST["txt_maloaisp"] : "";
        $masp = isset($_POST["txt_masp"]) ? $_POST["txt_masp"] : "";
        $maspnew = str_replace(" ", "", $masp); 
        if (strlen($maspnew) > 50) {
            $_SESSION['message'][] = "Mã sản phẩm không được vượt quá 50 ký tự!";
            header("Location: ./AdProduct/insert"); 
            exit();
        }
        $tensp = isset($_POST["txt_tensp"]) ? $_POST["txt_tensp"] : "";
        if (strlen($tensp) > 50) {
            $_SESSION['message'][] = "Tên sản phẩm không được vượt quá 50 ký tự!";
            header("Location: ./AdProduct/insert"); 
            exit();
        }
        $hinhanh = "";
        $soluong = isset($_POST["txt_soluong"]) ? $_POST["txt_soluong"] : "";
        if ($soluong < 0) {
            $_SESSION['message'][] = "số lượng sản phẩm không thể bé hơn 0!";
            header("Location: ./AdProduct/insert"); 
            exit();
        }
        $gianhap = isset($_POST["txt_gianhap"]) ? $_POST["txt_gianhap"] : "";
        if ($gianhap < 1000) {
            $_SESSION['message'][] = "Giá nhập sản phẩm phải lớn hơn 1000!";
            header("Location: ./AdProduct/insert");
            exit();
        }
        $giaxuat = isset($_POST["txt_giaxuat"]) ? $_POST["txt_giaxuat"] : "";
        if ($giaxuat < 1000) {
            $_SESSION['message'][] = "Giá xuất sản phẩm phải lớn hơn 1000!";
            header("Location: ./AdProduct/insert");
            exit();
        }
        $khuyenmai = isset($_POST["txt_khuyenmai"]) ? $_POST["txt_khuyenmai"] : "";
        $giaxuatvakuyenmai = $giaxuat - $khuyenmai;
        if ($giaxuatvakuyenmai < 1000) {
            $_SESSION['message'][] = "Giá xuất + khuyến mại sản phẩm nhỏ hơn 1000!";
            header("Location: ./AdProduct/insert");
            exit();
        }
        $mota = isset($_POST["txt_mota"]) ? $_POST["txt_mota"] : "";
        if (strlen($mota) > 200) {
            $_SESSION['message'][] = "Mô tả sản phẩm không được vượt quá 200 ký tự!";
            header("Location: ./AdProduct/insert"); 
            exit();
        }
        $create_date = isset($_POST["txt_create_date"]) ? $_POST["txt_create_date"] : "";
    
        if (isset($_FILES["txt_hinhanh"])) {
            $hinhanh = $_FILES["txt_hinhanh"]["name"];
            $file_tmp = $_FILES["txt_hinhanh"]["tmp_name"];
            $file_size = $_FILES["txt_hinhanh"]["size"];
            $file_ext = strtolower(pathinfo($hinhanh, PATHINFO_EXTENSION));
            $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($file_ext, $allowed_extensions)) {
                $_SESSION['message'][] = "Hình ảnh phải có định dạng .jpg, .jpeg, .png, hoặc .gif.";
            } elseif ($file_size > 10485760) {
                $_SESSION['message'][] = "Dung lượng hình ảnh phải nhỏ hơn 10MB.";
            } else {
                move_uploaded_file($file_tmp, "./public/images/" . $hinhanh);
            }
        }
        // Kiểm tra trùng mã sản phẩm
        if ($obj->checkProductExists($maspnew)) {
            $_SESSION['message'][] = "Mã sản phẩm đã tồn tại!";
            header("Location: ./AdProduct/insert"); // Quay lại form thêm
            exit();
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_SESSION['message'])) {
            $obj->insertAdProduct($ma_loaisp, $maspnew, $tensp, $hinhanh, $soluong, $gianhap, $giaxuat, $khuyenmai, $mota, $create_date);
            $_SESSION['message'][] = "Thêm mới sản phẩm thành công!";
            header("Location: ./AdProduct");
            exit();
        }
        // Hiển thị form thêm
        $productType = $obj2->getAdProductType();
        $this->view("Manager_View", ["page" => "AdProductView_insert", "productType" => $productType]);
    }    
    public function update($masp) {
        $obj = $this->model("AdProductModel");
        $productList = $obj->getAdProductID($masp);
        $productTypes = $obj->getProductTypes();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ma_loaisp = $_POST["txt_maloaisp"] ?? $productList["ma_loaisp"];
            $tensp = $_POST["txt_tensp"] ?? $productList["tensp"];
            $hinhanh = $productList["hinhanh"]; 
    
            if (isset($_FILES["txt_hinhanh"]) && $_FILES["txt_hinhanh"]["error"] == UPLOAD_ERR_OK) {
                $hinhanh = $_FILES["txt_hinhanh"]["name"];
                $file_tmp = $_FILES["txt_hinhanh"]["tmp_name"];
                $file_size = $_FILES["txt_hinhanh"]["size"];
                $file_ext = strtolower(pathinfo($hinhanh, PATHINFO_EXTENSION));
                $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
    
                if (in_array($file_ext, $allowed_extensions) && $file_size <= 10485760) {
                    move_uploaded_file($file_tmp, "./public/images/" . $hinhanh);
                } else {
                    echo "Hình ảnh không hợp lệ.";
                    exit();
                }
            }
            $soluong = $_POST["txt_soluong"] ?? $productList["soluong"];
            $gianhap = $_POST["txt_gianhap"] ?? $productList["gianhap"];
            $giaxuat = $_POST["txt_giaxuat"] ?? $productList["giaxuat"];
            $khuyenmai = $_POST["txt_khuyenmai"] ?? $productList["khuyenmai"];
            $mota = $_POST["txt_mota"] ?? $productList["mota"];
            $create_date = $_POST["txt_create_date"] ?? $productList["create_date"];
    
            $obj->updateAdProduct($ma_loaisp, $masp, $tensp, $hinhanh, $soluong, $gianhap, $giaxuat, $khuyenmai, $mota, $create_date);
            header("Location: ..");
            exit();
        }
        $this->view("Manager_View", ["page" => "AdProductView_edit","product" => $productList,"productTypes" => $productTypes]);
    }    
    public function delete($masp){
        $obj=$this->model("AdProductModel");
        $obj->deleteAdProduct($masp);   
        header("location:..");
        exit(); 
    }  
    public function search() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $keyword = isset($_POST['txt_keyword']) ? $_POST['txt_keyword'] : '';
            $obj = $this->model("AdProductModel");
            $data = $obj->searchAdProduct2($keyword); 
            $this->view("Manager_View", ["page" => "AdProductView", "product" => $data]);
        }
    }
}
