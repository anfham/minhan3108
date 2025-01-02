<form action="../Orderdetail/processOrder" method="post">
    <table class="product-table">
        <tr>
            <th colspan="5">Thông tin đặt hàng</th>
        </tr>
        <tr class="table-row">
            <td><label for="customer_name">Tên khách hàng:</label></td>
            <td><input type="text" id="customer_name" name="customer_name" required><br></td>
            
        </tr>
        <tr class="table-row">
            <td><label for="shipping_address">Địa chỉ giao hàng:</label></td>
            <td><textarea id="shipping_address" name="shipping_address" required></textarea><br></td>
        </tr>  
        <tr class="table-row"> 
            <td><label for="phone_number">Số điện thoại:</label></td>
            <td><input type="text" id="phone_number" name="phone_number" required><br></td>
        </tr> 
        <tr class="table-row"> 
            <td><label for="note">tin nhắn để lại:</label></td>
            <td><textarea id="note" name="note" colse="30" rows="6"></textarea><br></td>
        </tr> 
        <tr>
            <td>phương thức thanh toán</td>
            <td>
                <select name="payment_method" required>
                <option value="">chọn phương thức thanh toán </option>
                <option value="tiền mặt">tiền mặt</option>
                <option value="khác">khác</option>
                </select>
            </td>
        </tr>
    </table>

    <h3>Chi tiết giỏ hàng</h3>
    <table class="product-table">
        <tr>
            <td>Tên sản phẩm</td>
            <td>hình ảnh sản phẩm</td>
            <td>Số lượng</td>
            <td>Giá</td>
            <td>Khuyến mãi</td>
            <td>Tổng</td>
        </tr>
        <?php
        $tongtien = 0;

        foreach ($_SESSION['cart'] as $product):
            $itemTotal = ($product['giaxuat'] - $product['khuyenmai']) * $product['qty'];
            $tongtien += $itemTotal;
        ?>
        <tr class="table-row">
            <td><?php echo $product['tensp']; ?></td>
            <td>
                <img src="../public/images/<?php echo $product["hinhanh"]; ?>" width="100" height="100"/>
            </td>
            <td><?php echo $product['qty']; ?></td>
            <td><?php echo $product['giaxuat']; ?></td>
            <td><?php echo $product['khuyenmai']; ?></td>
            <td><?php echo $itemTotal; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div style="margin-top: 20px;">
        <strong>Tổng tiền: <?php echo $tongtien; ?></strong>
    </div>

    <div style="margin-top: 20px;">
        <button type="submit">Đặt hàng</button>
    </div>
</form>
