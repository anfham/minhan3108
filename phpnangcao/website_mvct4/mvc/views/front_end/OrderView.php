<?php 
    if (isset($_SESSION['message'])) {
        // Gửi thông báo vào view messenger.php
        $data['message'] = $_SESSION['message'];
        include "mvc/views/partials/message.php";   
        unset($_SESSION['message']);  
    }
?>
<?php if (!empty($_SESSION['cart'])): ?>
    <form action="../Order/updateCart" method="post">
        <table>
            <tr>
                <td>Hình ảnh</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Khuyến mãi</td>
                <td>Số lượng</td>
                <td>Tổng</td>
                <td>Xóa</td>
            </tr>
            <?php
            $tongtien = 0;

            foreach ($_SESSION['cart'] as $masp => $product): 
                $itemTotal = ($product['giaxuat'] - $product['khuyenmai']) * $product['qty'];
                $tongtien += $itemTotal;
            ?>
            <tr>
                <td>
                    <img src="<?php echo BASE_URL; ?>/public/images/<?php echo $product['hinhanh']; ?>" alt="<?php echo $product['tensp']; ?>" width="100px" height="100px">
                </td>
                <td><?php echo $product['tensp']; ?></td>
                <td><?php echo number_format($product['giaxuat'],0, ',', '.'); ?> VNĐ</td>
                <td><?php echo number_format($product['khuyenmai'],0, ',', '.'); ?> VNĐ</td>
                <td>
                    <input type="number" name="qty[<?php echo $masp; ?>]" value="<?php echo $product['qty']; ?>" min="1">
                </td>
                <td><?php echo number_format($itemTotal,0, ',', '.'); ?> VNĐ</td>
                <td>
                    <button type="submit" name="delete" value="<?php echo $masp; ?>" >
                        Xóa
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" name="update">Cập nhật giỏ hàng</button>
            <a href="../Orderdetail/" class="btn-order">Đặt hàng</a>
            <div class="total" style="margin-top: 20px;">
                Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.'); ?> VNĐ
            </div>
        </div>
    </form>
<?php else: ?>
    <div style="text-align: center; margin-top: 20px;">Giỏ hàng trống</div>
<?php endif; ?>
