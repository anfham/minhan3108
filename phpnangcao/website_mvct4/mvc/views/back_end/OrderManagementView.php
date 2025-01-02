    <table class="product-table">
        <tr>
            <th colspan="13">Quản lý đơn hàng</th>
        </tr>   
        <tr class="table-header">
            <td>Mã đơn</td>
            <td>Mã người dùng</td>    
            <td>Tên người dùng</td>
            <td>Địa chỉ</td>
            <td>Phone</td>
            <td>Ngày đặt</td>
            <td>Tổng tiền</td>
            <td>Thanh toán</td>
            <td>Chi tiết</td>
            <td>Trạng thái</td>
            <td>Ngày update</td>
            <td>Xóa</td>
        </tr>
        <?php foreach($data["order"] as $v){ ?>
        <tr class="table-row">
            <td><?php echo $v["id"]?></td>
            <td><?php echo $v["user_id"]?></td>
            <td><?php echo $v["customer_name"]?></td>
            <td><?php echo $v["shipping_address"]?></td>
            <td><?php echo $v["phone_number"]?></td>
            <td><?php echo $v["order_date"]?></td>
            <td><?php echo $v["total_amount"]?></td>
            <td><?php echo $v["detail"]?></td>
            <td><?php echo $v["note"]?></td>
            <td><?php echo $v["payment_method"]?></td>
            <form action="../OrderManagement/updateStatus" method="post">
                <td>
                    <select name="order_status[<?= $v['id'] ?>]" required>
                        <option value=""><?= $v["order_status"] ?></option>
                        <option value="pending">Chờ xét duyệt</option>
                        <option value="shipping">Đang giao hàng</option>
                        <option value="shipped">Đã giao hàng</option>
                        <option value="paid">Đã thanh toán</option>
                        <option value="waiting for payment">Chờ thanh toán</option>
                    </select>
                    <button type="submit">Cập nhật</button>
                </td>
            </form>
            <td><?php echo $v["updated_at"]?></td>
            <td>
                <a href="./delete/<?php echo $v["id"]; ?>" class="btn-delete">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    

