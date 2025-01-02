<?php 
    if (isset($_SESSION['message'])) {
        // Gửi thông báo vào view messenger.php
        $data['message'] = $_SESSION['message'];
        include "mvc/views/partials/message.php";   
        unset($_SESSION['message']);  
    }
?>
<form action="../Discount/updateDiscount" method="post">
    <table class="product-table">
        <tr>
            <th colspan="10">Quản lý chương trình khuyến mại</th>
        </tr>
        <tr>
            <td colspan="3">
                Chọn mã sản phẩm:
                <select name="txt_masp">
                    <?php
                    // Lấy danh sách sản phẩm từ `$data["product"]`
                    foreach ($data["product"] as $product) {
                        ?>
                        <option value="<?php echo $product["masp"]; ?>">
                            <?php echo $product["masp"]; ?> - <?php echo $product["tensp"]; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
            <td>
                Nhập số tiền giảm giá:
                <input type="number" name="txt_discount" min="0" required>
            </td>
            <td>
                Ngày bắt đầu khuyến mãi:
                <input type="date" name="start_date" required>
            </td>
            <td>
                Ngày kết thúc khuyến mãi:
                <input type="date" name="end_date" required>
            </td>
            <td>
                <input type="submit" value="Áp dụng khuyến mãi" name="btn_submit">
            </td>
        </tr>
    </table>
</form>
