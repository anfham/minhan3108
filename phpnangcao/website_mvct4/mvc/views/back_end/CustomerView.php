<?php
$obj= new Customer;
?>
<form action="../Customer/search" method="post">
    <input type="text" name="txt_keyword" placeholder="Tìm người dùng..." />
    <select name="txt_status">
        <option value="">Tất cả</option>
        <option value="sắt">Sắt</option>
        <option value="đồng">Đồng</option>
        <option value="bạc">Bạc</option>
        <option value="vàng">Vàng</option>
        <option value="bạch kim">Bạch Kim</option>
        <option value="lục bảo">Lục Bảo</option>
        <option value="kim cương">Kim Cương</option>
        <option value="V.I.P">V.I.P</option>
    </select>
    <button type="submit">Tìm kiếm</button>
</form>

<form action="" method="post">
<table class="product-table">
    <tr>
        <th colspan="14" style="text-align: center;">Quản lý khách hàng</th>
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
        <td>tổng tiền tiêu</td>
        <td>sửa</td>
        <td>xóa</td>
    </tr>
    <?php if (!empty($data["customers"])): ?>
    <?php foreach ($data["customers"] as $v): ?>
        <tr class="table-row">
            <td><?php echo $v["id"] ?></td>
            <td><?php echo $v["name"] ?></td>
            <td><?php echo $v["email"] ?></td>
            <td><?php echo $v["password"] ?></td>
            <td><?php echo $v["user_type"] ?></td>
            <td><?php echo $v["phone"] ?></td>
            <td><?php echo $v["sex"] ?></td>
            <td><?php echo $v["address"] ?></td>
            <td><?php echo $v["access_lvl"] ?></td>
            <td><?php echo $v["user_create_date"] ?></td>
            <td><?php echo $v["buy_state"] ?></td>
            <td><?php echo $v["total_spend"] ?></td>
            <td><a href="./update/<?php echo $v["id"]; ?>">Cập nhập</a></td>
            <td><a href="./delete/<?php echo $v["id"]; ?>">Xóa</a></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="14" style="text-align: center;">Không tìm thấy kết quả.</td>
    </tr>
<?php endif; ?>
</table>
</form>