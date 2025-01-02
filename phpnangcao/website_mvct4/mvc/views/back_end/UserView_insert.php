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
                    <td>tên người dùng</td>
                    <td><input name="txt_name" type="text" value="" required class="box" /></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input name="txt_email" type="text" value="" required class="box" /></td>
                </tr>
                <tr>
                    <td>mật khẩu</td>
                    <td><input name="txt_password" type="password" value="" required class="box" /></td>
                </tr>
                <tr>
                    <td>loại người dùng</td>
                    <td>
                        <select name="txt_user_type" required class="box">
                            <option value="" disabled selected>Chọn loại người dùng</option>
                            <option value="user">Người dùng</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>điện thoại</td>
                    <td><input name="txt_phone" type="text" value="" /></td>
                </tr>
                <tr>
                    <td>giới tính</td>
                    <td>
                        <select name="txt_sex" >
                            <option value="">chọn giới tính</option>
                            <option value="male">nam</option>
                            <option value="female">nữ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>địa chỉ</td>
                    <td>
                        <textarea name="txt_address" cols="30" rows="6"><?php echo " " ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_submit" value="Thêm" />
                        <input type="reset" name="reset" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </td>
</tr>
