<?php
class Orderdetail extends Controller {
    public function getshow() {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['message'] = ["Giỏ hàng trống, không thể đặt hàng."];
            header("Location: ../Order/cart");
            exit();
        }
        $this->view("HomeView", ['page' => "OrderCartView"]);
    }

    public function processOrder() {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['message'] = ["Giỏ hàng trống, không thể đặt hàng."];
            header("Location: ../Order/cart");
            exit();
        }
        // Lấy dữ liệu từ form
        $user_id = $_SESSION['user_id'];
        $customer_name = $_POST['customer_name'];
        $shipping_address = $_POST['shipping_address'];
        $phone_number = $_POST['phone_number'];
        $payment_method = $_POST['payment_method'];
        $order_date = date("Y-m-d");
        $total_amount = 0;
        $note = $_POST['note'];
        $detail = ""; 
        foreach ($_SESSION['cart'] as $masp => $product) {
            $total_amount += ($product['giaxuat'] - $product['khuyenmai']) * $product['qty'];
            $detail .= "x{$product['qty']} {$product['tensp']}, ";
        }
        $detail = rtrim($detail, ", ");
        $orderModel = $this->model("OrderModel");
        $orderModel->createOrder(null, $user_id, $customer_name, $shipping_address, $phone_number, $order_date, $total_amount, $payment_method, "Pending", null, $detail, $note);
        $productModel = $this->model("AdProductModel");
        foreach ($_SESSION['cart'] as $masp => $product) {
            $availableQty = $productModel->getQuantity($masp);
            if ($product['qty'] > $availableQty) {
                $_SESSION['message'] = ["Sản phẩm {$product['tensp']} không đủ số lượng trong kho."];
                header("Location: ../Order/cart");
                exit();
            }
            $productModel->trusoluong($masp, $product['qty']);
        }
    
        // Cập nhật trạng thái người dùng
        $userModel = $this->model("LoginModel");
        $userModel->updateTotal_spend($user_id, $total_amount);
        if ($userModel->getBuy_state($user_id) !== 'have') {
            $userModel->updateBuy_state($user_id, 'have');
        }
    
        // Xóa giỏ hàng và chuyển hướng
        unset($_SESSION['cart']);
        $_SESSION['message'] = ["Đặt hàng thành công!"];
        header("Location: ../Order/cart");
        exit();
    }    
}
