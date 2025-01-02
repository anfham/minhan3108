<?php
$txt_masp=isset($_POST["txt_masp"])?$_POST["txt_masp"]:$data["product"]["masp"];
$txt_tensp=isset($_POST["txt_tensp"])?$_POST["txt_tensp"]:$data["product"]["tensp"];
$txt_hinhanh=isset($_POST["txt_hinhanh"])?$_POST["txt_hinhanh"]:$data["product"]["hinhanh"];
$txt_soluong=isset($_POST["txt_soluong"])?$_POST["txt_soluong"]:$data["product"]["soluong"];
$txt_gianhap=isset($_POST["txt_gianhap"])?$_POST["txt_gianhap"]:$data["product"]["gianhap"];
$txt_giaxuat=isset($_POST["txt_giaxuat"])?$_POST["txt_giaxuat"]:$data["product"]["giaxuat"];
$txt_khuyenmai=isset($_POST["txt_khuyenmai"])?$_POST["txt_khuyenmai"]:$data["product"]["khuyenmai"];
$txt_mota=isset($_POST["txt_mota"])?$_POST["txt_mota"]:$data["product"]["mota"];
$txt_create_date=isset($_POST["txt_create_date"])?$_POST["txt_create_date"]:$data["product"]["create_date"];
?>
<form method="post" enctype="multipart/form-data">
    <table class="product-table">
            <tr>
                <td>mã loại sản phẩm</td>
                <td>
                    <select name="txt_maloaisp">
                        <?php foreach ($data['productTypes'] as $type): ?>
                            <option value="<?php echo $type['ma_loaisp']; ?>" <?php echo ($type['ma_loaisp'] == $data['product']['ma_loaisp']) ? 'selected' : ''; ?>>
                                <?php echo $type['ma_loaisp'] . ' - ' . $type['ten_loaisp']; ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>mã sản phẩm</td>
                <td><input name ="txt_masp"type = "text" readonly value="<?php echo $txt_masp; ?>"/></td> 
            </tr>
            <tr>
                <td>tên sản phẩm</td>
                <td><input name ="txt_tensp"type = "text" value="<?php echo $txt_tensp; ?>"/></td>
            </tr>
            <tr>
                <td>Hình ảnh hiện tại</td>
                <td>
                    <img src="/phpnangcao/website_mvct4/public/images/<?php echo $txt_hinhanh; ?>" width="100px" height="100px" />
                </td>
            </tr>
            <tr>
                <td>hình ảnh sản phẩm mới</td>
                <td><input name ="txt_hinhanh"type = "file"/></td> 
            </tr>
            <tr>
                <td>số lượng sản phẩm</td>
                <td><input name ="txt_soluong"type = "number" value="<?php echo $txt_soluong; ?>"/></td>
            </tr>
            <tr>
                <td>giá nhập sản phẩm</td>
                <td><input name ="txt_gianhap"type = "number" value="<?php echo $txt_gianhap; ?>"/></td>
            </tr>
            <tr>
                <td>giá xuất sản phẩm</td>
                <td><input name ="txt_giaxuat"type = "number" value="<?php echo $txt_giaxuat; ?>"/></td>
            </tr>
            <tr>
                <td>khuyến mại sản phẩm</td>
                <td><input name ="txt_khuyenmai"type = "number" value="<?php echo $txt_khuyenmai; ?>"/></td>
            </tr>
            <tr>
            <td>mô tả sản phẩm</td>
                <td>
                    <textarea name="txt_mota" cols="30" rows="6">
                        <?php echo $txt_mota ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>ngày</td>
                <td><input name ="txt_create_date"type = "date" value="<?php echo $txt_create_date; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" value="cập nhập"/>
                    <input type="reset" name="reset" value="Reset"/>
                </td>
            </tr>
    </table>
</form>