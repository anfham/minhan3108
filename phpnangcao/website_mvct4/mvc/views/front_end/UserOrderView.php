<?php
if (isset($_SESSION['message'])) {
    // Gửi thông báo vào view messenger.php
    $data['message'] = $_SESSION['message'];
    include "mvc/views/partials/message.php";   
    unset($_SESSION['message']);  
}
?>
<table class="product-table">
        <tr>
            <th colspan="13">Đơn hàng</th>
        </tr>   
        <tr class="table-header">
            <td>Mã đơn</td> 
            <td>Tên người dùng</td>
            <td>Địa chỉ</td>
            <td>Phone</td>
            <td>Ngày đặt</td>
            <td>Tổng tiền</td>
            <td>Thanh toán</td>
            <td>Trạng thái</td>
            <td>chi tiết</td>
            <td>Ngày update</td>

        </tr>
        <?php foreach($data["order"] as $v){ ?>
        <tr class="table-row">
            <td><?php echo $v["id"]?></td>
            <td><?php echo $v["customer_name"]?></td>
            <td><?php echo $v["shipping_address"]?></td>
            <td><?php echo $v["phone_number"]?></td>
            <td><?php echo $v["order_date"]?></td>
            <td><?php echo $v["total_amount"]?></td>
            <td><?php echo $v["payment_method"]?></td>
            <form action="../UserOrder/updateStatus" method="post">
                <td>
                    <select name="order_status[<?= $v['id'] ?>]" required>
                        <option value=""><?= $v["order_status"] ?></option>
                        <option value="cancel">Hủy đơn</option>

                    </select>
                    <button type="submit">Cập nhật</button>
                </td>
            </form>
            <td><?php echo $v["detail"]?></td>
            <td><?php echo $v["updated_at"]?></td>
            
        </tr>
        <?php } ?>
    </table>
    

