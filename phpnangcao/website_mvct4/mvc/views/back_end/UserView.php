<?php
$obj= new User;
?>
<form action="../User/search" method="post">
    <input type="text" name="txt_keyword" placeholder="Tìm người dùng..." />
    <button type="submit">Tìm kiếm</button>
</form>

<form action="" method="post">
<table class="product-table">
    <tr>
        <th colspan="13" style="text-align: center;">Quản lý người dùng</th>
    </tr>
    <tr class="table-header">
        <td>id</td>
        <td>tên</td>
        <td>email</td>
        <td>mật khẩu</td>
        <td>loại</td>
        <td>số đt</td>
        <td>giới tính</td>
        <td>địa chỉ</td>
        <td>mức độ</td>
        <td>ngày tạo</td>
        <td>trạng thái</td>
        <td>sửa</td>
        <td>xóa</td>
    </tr>
    <?php foreach($data["users"] as $v){ ?>
    <tr class="table-row">
        <td><?php echo $v["id"]?></td>
        <td><?php echo $v["name"]?></td>
        <td><?php echo $v["email"]?></td>
        <td><?php echo $v["password"]?></td>
        <td><?php echo $v["user_type"]?></td>
        <td><?php echo $v["phone"]?></td>
        <td><?php echo $v["sex"]?></td>
        <td><?php echo $v["address"]?></td>
        <td><?php echo $v["access_lvl"]?></td>
        <td><?php echo $v["user_create_date"]?></td>
        <td><?php echo $v["buy_state"]?></td>
        <td>
            <a href="./update/<?php echo $v["id"]; ?>">cập nhập</a>
        </td>
        <td>
            <a href="./delete/<?php echo $v["id"]; ?>">Xóa</a>
        </td>
    </tr>
    <?php }?>
</table>
<div class="add-product-link">
        <a href="./insert/">thêm tài khoản</a>
    </div>
</form>