<?php
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location: ../Home");
    exit();
}

class UserOrder extends Controller {
    public function getshow() {
        $obj = $this->model("OrderModel");
        $user_id = $_SESSION['user_id'];
        $data = $obj->getOrderByUserID($user_id);
        $this->view("HomeView", ['page' => "UserOrderView", "order" => $data]);
    }

    public function updateStatus() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $statuses = $_POST['order_status'] ?? [];
            $obj = $this->model("OrderModel");
    
            foreach ($statuses as $id => $status) {
                if ($status) {
                    // Lấy trạng thái hiện tại của đơn hàng
                    $currentOrder = $obj->getOrderID($id); 
                    
                    if (!$currentOrder) {
                        // Đơn hàng không tồn tại
                        continue;
                    }

                    $currentStatus = $currentOrder[0]['order_status'];

                    // Kiểm tra nếu trạng thái hiện tại là 'pending'
                    if ($currentStatus === 'Pending') {
                        $obj->updateStatus($id, $status);
                    } else {
                        // Nếu không phải trạng thái 'pending', bỏ qua cập nhật
                        $_SESSION['message'][] = "Đơn hàng #$id không thể cập nhật vì không ở trạng thái pending.";
                    }
                }
            }

            header("Location: ../UserOrder/");
            exit();
        }
    }

}
?>
