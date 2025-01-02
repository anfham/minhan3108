<?php
if (isset($_SESSION['message'])) {
    // Gửi thông báo vào view messenger.php
    $data['message'] = $_SESSION['message'];
    include "mvc/views/partials/message.php";   
    unset($_SESSION['message']);  
}
//var_dump($data["productList"]);
?>
<div class="product-list">
    <?php foreach ($data["productList"] as $k => $v): ?>
        <div class="product">
            <img src="<?php echo BASE_URL; ?>/public/images/<?php echo $v['hinhanh']; ?>" alt="<?php echo $v['tensp']; ?>" />
            <div class="product-name"><?php echo $v["tensp"]; ?></div>
            
            <div class="product-price">
                <?php if ($v["khuyenmai"] > 0): ?>
                    <div class="old-price"><?php echo number_format($v['giaxuat'], 0, ',', '.'); ?> VND</div>
                    <div class="current-price">
                        <?php echo number_format($v['giaxuat'] - $v['khuyenmai'], 0, ',', '.'); ?> VND
                    </div>
                <?php else: ?>
                    <div class="current-price"><?php echo number_format($v['giaxuat'], 0, ',', '.'); ?> VND</div>
                <?php endif; ?>
            </div>
            
            <div class="product-actions">
                <a href="<?php echo BASE_URL; ?>/Detail/getshow/<?php echo $v['masp']; ?>">Chi tiết</a>
                <a href="<?php echo BASE_URL; ?>/Order/Addtocart/<?php echo $v['masp']; ?>">Thêm giỏ hàng</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>