<?php
if (isset($_SESSION['message'])) {
    $data['message'] = $_SESSION['message'];
    include "mvc/views/partials/message.php";
    unset($_SESSION['message']);
}
?>
<tr>
    <td colspan="5">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="product-table">
            <tr>
                <td>mã loại sản phẩm</td>
                <td>
                    <select name="txt_maloaisp" required>
                    <? var_dump($data["productType"]) ?>
                        <?php
                        foreach ($data["productType"] as $k=>$v){
                        ?>   
                        <option value="<?php echo $v["ma_loaisp"]?>">
                                <?php echo $v["ma_loaisp"]?> - <?php echo $v["ten_loaisp"]?>
                        </option> 
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>mã sản phẩm</td>
                <td><input name ="txt_masp"type = "text" value="" required/></td> 
            </tr>
            <tr>
                <td>tên sản phẩm</td>
                <td><input name ="txt_tensp"type = "text" value="" required/></td>
            </tr>
            <tr>
                <td>hình ảnh sản phẩm</td>
                <td><input name ="txt_hinhanh"type = "file" required/></td> 
            </tr>
            <tr>
                <td>số lượng sản phẩm</td>
                <td><input name ="txt_soluong"type = "number" value="" required/></td>
            </tr>
            <tr>
                <td>giá nhập sản phẩm</td>
                <td><input name ="txt_gianhap"type = "number" value="" required/></td>
            </tr>
            <tr>
                <td>giá xuất sản phẩm</td>
                <td><input name ="txt_giaxuat"type = "number" value="" required/></td>
            </tr>
            <tr>
                <td>khuyến mại sản phẩm</td>
                <td><input name ="txt_khuyenmai"type = "number" value=""/></td>
            </tr>
            <tr>
            <td>mô tả sản phẩm</td>
                <td>
                    <textarea name="txt_mota" colse="30" rows="6">
                        <?php echo " " ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>ngày</td>
                <td><input name ="txt_create_date" type = "date" value=" " required/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" value="Thêm"/>
                    <input type="reset" name="reset" value="Reset"/>
                </td>
            </tr>
            </table>
        </form>
    </td>
</tr>