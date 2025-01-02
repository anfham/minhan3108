<?php include "mvc/views/partials/message.php"; ?>
<section class="Logincss">
    <div class="form">
        <form action="../Register/insertAdmin" method="post" class="box">
        <h3>Tạo tài khoản</h3>
        <input name="txt_name" type="text"placeholder="nhập tên tài khoản" required class="box">
        <input name="txt_email" type="text"placeholder="nhập email" required class="box">
        <input name="txt_password" type="password"placeholder="nhập mật khẩu" required class="box">
        <input name="txt_cpassword" type="password"placeholder="nhập lại mật khẩu" required class="box">
        <input name="create" type="submit" value="tạo tài khoản" class="btn">
        <input type="reset" name="reset" value="Reset" class="btn"/>
        </form>
    </div>
</section>  