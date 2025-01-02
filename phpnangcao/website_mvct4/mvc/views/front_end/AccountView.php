<?php
$txt_name=isset($_POST["txt_name"])?$_POST["txt_name"]:$data["users"]["name"];
$txt_email=isset($_POST["txt_email"])?$_POST["txt_email"]:$data["users"]["email"];
$txt_password=isset($_POST["txt_password"])?$_POST["txt_password"]:$data["users"]["password"];
$txt_phone=isset($_POST["txt_phone"])?$_POST["txt_phone"]:$data["users"]["phone"];
$txt_sex=isset($_POST["txt_sex"])?$_POST["txt_sex"]:$data["users"]["sex"];
$txt_address=isset($_POST["txt_address"])?$_POST["txt_address"]:$data["users"]["address"];
?>
<tr>
    <td colspan="5">
        <form action="../Account/update/" method="post" enctype="multipart/form-data">
            <table class="product-table">
            <tr>
                <td>tên người dùng</td>
                <td><input name ="txt_name"type = "text" value="<?php echo $txt_name; ?>"required/></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input name ="txt_email"type = "text" value="<?php echo $txt_email; ?>"required/></td>
            </tr>
            <tr>
                <td>mật khẩu</td>
                <td><input name ="txt_password"type = "password" value="<?php echo $txt_password; ?>"required/></td>
            </tr>
            <tr>
                <td>điện thoại</td>
                <td><input name ="txt_phone"type = "text" value="<?php echo $txt_phone; ?>"required/></td>
            </tr>
            <tr>
                <td>giới tính</td>
                <td>
                    <select name="txt_sex" >
                        <option value="<?php echo $txt_sex; ?>"><?php echo $txt_sex; ?></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
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
                </td>
            </tr>
            </table>
        </form>
    </td>
</tr>