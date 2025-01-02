<?php
$obj= new AdProductType;
$ma_loaisp=" ";
$ten_loaisp=" ";
$mota_loaisp=" ";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $obj->insert();
}

if (isset($_SESSION['message'])) {
    $data['message'] = $_SESSION['message'];
    include "mvc/views/partials/message.php";   
    unset($_SESSION['message']);  
}
?>
<form action="" method="post">
    <table class="product-table">
        <tr>
            <th colspan="5">Quản lý danh mục loại sản phẩm</th>
        </tr>
        <tr>
            <td colspan="5">
            <form action="" method="post">
            <input name ="txt_maloaisp"type = "text"
            value="<?php echo $ma_loaisp;?>"/>

            <input name ="txt_tenloaisp"type = "text"
            value="<?php echo $ten_loaisp;?>"/>

            <input name ="txt_motaloaisp"type = "text"
            value="<?php echo $mota_loaisp;?>"/>
            
            <input type="submit" name="btn_submit"/>
            </form>
        </td>
        </tr>
        <tr>
            <td>Mã loại sản phẩm</td>
            <td>Tên loại sản phẩm</td>
            <td>Mô tả loại sản phẩm</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php foreach($data["productType"] as $v){ ?>
        <tr class="table-row">
            <td><?php echo $v["ma_loaisp"]?></td>
            <td><?php echo $v["ten_loaisp"]?></td>
            <td><?php echo $v["mota_loaisp"]?></td>
            <td>
                <a href="./update/<?php echo $v["ma_loaisp"]; ?>"  class="btn-update">Update</a>
            </td>
            <td>
                <a href="./delete/<?php echo $v["ma_loaisp"]; ?>"  class="btn-delete">Xóa</a>
            </td>
        </tr>
        <?php }?>
    </table>
</form>