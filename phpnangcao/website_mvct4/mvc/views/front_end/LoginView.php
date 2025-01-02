<?php include "mvc/views/partials/message.php"; ?>
<section class="Logincss">
    <div class="form">
        <form action="../Login/authenticate" method="post" class="box">
        <h3>đăng nhập</h3>
        <input name="email" type="text"placeholder="nhập email" required class="box">
        <input name="password" type="text"placeholder="nhập mật khẩu" required class="box">
        <input name="submit" type="submit" value="đăng nhập" class="btn">
        <p>chưa có tài khoản <a href="<?php echo BASE_URL; ?>/Register/">đăng ký</a></p>
        </form>
    </div>
</section>
