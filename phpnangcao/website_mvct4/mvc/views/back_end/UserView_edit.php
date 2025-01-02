<?php
$txt_id=isset($_POST["txt_id"])?$_POST["txt_id"]:$data["users"]["id"];
$txt_name=isset($_POST["txt_name"])?$_POST["txt_name"]:$data["users"]["name"];
$txt_email=isset($_POST["txt_email"])?$_POST["txt_email"]:$data["users"]["email"];
$txt_password=isset($_POST["txt_password"])?$_POST["txt_password"]:$data["users"]["password"];
$txt_user_type=isset($_POST["txt_user_type"])?$_POST["txt_user_type"]:$data["users"]["user_type"];
$txt_phone=isset($_POST["txt_phone"])?$_POST["txt_phone"]:$data["users"]["phone"];
$txt_sex=isset($_POST["txt_sex"])?$_POST["txt_sex"]:$data["users"]["sex"];
$txt_address=isset($_POST["txt_address"])?$_POST["txt_address"]:$data["users"]["address"];
?>
<tr>
    <td colspan="5">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="product-table">
            <tr>
                <td>id người dùng</td>
                <td><input name ="txt_id"type = "text" value="<?php echo $txt_id; ?>" readonly/></td>
            </tr>
            <tr>
                <td>tên người dùng</td>
                <td><input name ="txt_name"type = "text" value="<?php echo $txt_name; ?>"/></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input name ="txt_email"type = "text" value="<?php echo $txt_email; ?>"/></td>
            </tr>
            <tr>
                <td>mật khẩu</td>
                <td><input name ="txt_password"type = "password" value="<?php echo $txt_password; ?>"/></td>
            </tr>
            <tr>
                <td>loại người dùng</td>
                <td><input name ="txt_user_type"type = "text" value="<?php echo $txt_user_type; ?>"/></td>
            </tr>
            <tr>
                <td>điện thoại</td>
                <td><input name ="txt_phone"type = "text" value="<?php echo $txt_phone; ?>"/></td>
            </tr>
            <tr>
                <td>giới tính</td>
                <td>
                    <select name="txt_sex" >
                        <option value="<?php echo $txt_sex; ?>"><?php echo $txt_sex; ?></option>
                        <option value="male">nam</option>
                        <option value="female">nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>địa chỉ</td>
                <td>
                    <textarea name="txt_address" colse="30" rows="6">
                        <?php echo $txt_address ?>
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
    </td>
</tr>