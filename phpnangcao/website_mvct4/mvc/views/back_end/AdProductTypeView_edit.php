<?php
$txt_maloaisp=isset($_POST["txt_maloaisp"])?$_POST["txt_maloaisp"]:$data["productType"]["ma_loaisp"];
$txt_tenloaisp=isset($_POST["txt_tenloaisp"])?$_POST["txt_tenloaisp"]:$data["productType"]["ten_loaisp"];
$txt_motaloaisp=isset($_POST["txt_motaloaisp"])?$_POST["txt_motaloaisp"]:$data["productType"]["mota_loaisp"];
?>
<form method="post">
    <table class="product-table">
        <tr>
            <td>mã loại sản phẩm</td>
            <td>
                <input type="text" name="txt_maloaisp" readonly value="<?php echo $txt_maloaisp; ?>" />
            </td>
        </tr>
        <tr>
            <td>tên loại sản phẩm</td>
            <td>
                <input type="text" name="txt_tenloaisp" value="<?php echo $txt_tenloaisp; ?>" />
            </td>
        </tr>
        <tr>
            <td>mô tả sản phẩm</td>
            <td>
                <textarea name="txt_motaloaisp" colse="30" rows="6">
                    <?php echo $txt_motaloaisp ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="btn_submit" value="cập nhập"/>
                <input type="reset" name="reset" value="Reset"/>
            </td>
        </tr>
    </table>
</form>