<?php
$obj = new AdProduct;
?>
<form action="../AdProduct/search" method="post">
    <input type="text" name="txt_keyword" placeholder="Tìm kiếm sản phẩm..." />
    <button type="submit">Tìm kiếm</button>
</form>

<form action="" method="post">
    <table class="product-table">
        <tr>
            <th colspan="12">Quản lý danh mục sản phẩm</th>
        </tr>   
        <tr class="table-header">
            <td>Mã loại sản phẩm</td>
            <td>Mã sản phẩm</td>    
            <td>Tên sản phẩm</td>
            <td>Hình ảnh</td>
            <td>Số lượng</td>
            <td>Giá nhập</td>
            <td>Giá xuất</td>
            <td>Khuyến mại</td>
            <td>Mô tả</td>
            <td>Ngày nhập</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php foreach($data["product"] as $v){ ?>
        <tr class="table-row">
            <td><?php echo $v["ma_loaisp"]?></td>
            <td><?php echo $v["masp"]?></td>
            <td><?php echo $v["tensp"]?></td>
            <td>
                <img src="../public/images/<?php echo $v["hinhanh"]; ?>" width="100" height="100"/>
            </td>
            <td><?php echo $v["soluong"]?></td>
            <td><?php echo $v["gianhap"]?></td>
            <td><?php echo $v["giaxuat"]?></td>
            <td><?php echo $v["khuyenmai"]?></td>
            <td><?php echo $v["mota"]?></td>
            <td><?php echo $v["create_date"]?></td>
            <td>
                <a href="./update/<?php echo $v["masp"]; ?>" class="btn-update">Update</a>
            </td>
            <td>
                <a href="./delete/<?php echo $v["masp"]; ?>" class="btn-delete">Xóa</a>
            </td>
        </tr>
        <?php }?>
    </table>
    <div class="add-product-link">
        <a href="./insert/">Thêm sản phẩm</a>
    </div>
</form>
