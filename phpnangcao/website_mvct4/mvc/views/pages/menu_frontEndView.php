<ul class="menu1 mainmenu">
    <li>
        <a href="<?php echo BASE_URL; ?>/Home/">Trang chủ</a>
    </li>
    <li>
        <a href="<?php echo BASE_URL; ?>/Product/">Sản phẩm</a>
    </li>
    <li>
        <a href="<?php echo BASE_URL; ?>/NewsDetail/">Tin tức</a>
    </li>
    <li>
        <a href="<?php echo BASE_URL; ?>/Order/">Giỏ hàng</a>
    </li>
    <li>
        <a href="<?php echo BASE_URL; ?>/UserOrder/">Đơn hàng</a>
    </li>
    <li>
        <a href="<?php echo BASE_URL; ?>/Account/">Tài khoản cá nhân</a>
    </li>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <li>
            <a class="logout_btn" href="<?php echo BASE_URL; ?>/Login/logout">Đăng xuất</a>
        </li>
    <?php else: ?>
        <li>
            <a href="<?php echo BASE_URL; ?>/Login/">Đăng nhập</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/Register/">Đăng ký</a>
        </li>
    <?php endif; ?>
</ul>
