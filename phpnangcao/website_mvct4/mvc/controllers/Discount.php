<?php
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header("Location: ../Login/"); 
}
class Discount extends Controller{
    function getShow(){
        $obj=$this->model("AdProductModel");
        $data=$obj->getAdProduct();

        $this->view("Manager_View",["page"=>"DiscountView","product"=>$data]);
    }

    function updateDiscount() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $masp = $_POST['txt_masp'];
            $discountAmount = $_POST['txt_discount'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            if (empty($masp) || empty($discountAmount) || empty($startDate) || empty($endDate)) {
                $_SESSION['message'] = ["Vui lòng điền đầy đủ thông tin!"];
                header("Location: ../Discount/getShow");
                exit();
            }

            $obj = $this->model("AdProductModel");
            try {
                $obj->applyDiscount($masp, $discountAmount, $startDate, $endDate);
                $_SESSION['message'] = ["Khuyến mãi đã được áp dụng thành công!"];
            } catch (Exception $e) {
                $_SESSION['message'] = ["Lỗi: " . $e->getMessage()];
            }

            header("Location: ../Discount/getShow");
            exit();
        }
    }
}
