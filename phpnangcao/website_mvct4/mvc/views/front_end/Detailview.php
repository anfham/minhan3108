<?php
$txt_masp=isset($_POST["txt_masp"])?$_POST["txt_masp"]:$data["product"]["masp"];
$txt_tensp=isset($_POST["txt_tensp"])?$_POST["txt_tensp"]:$data["product"]["tensp"];
$txt_hinhanh=isset($_POST["txt_hinhanh"])?$_POST["txt_hinhanh"]:$data["product"]["hinhanh"];
$txt_soluong=isset($_POST["txt_soluong"])?$_POST["txt_soluong"]:$data["product"]["soluong"];
$txt_gianhap=isset($_POST["txt_gianhap"])?$_POST["txt_gianhap"]:$data["product"]["gianhap"];
$txt_giaxuat=isset($_POST["txt_giaxuat"])?$_POST["txt_giaxuat"]:$data["product"]["giaxuat"];
$txt_khuyenmai=isset($_POST["txt_khuyenmai"])?$_POST["txt_khuyenmai"]:$data["product"]["khuyenmai"];
$txt_mota=isset($_POST["txt_mota"])?$_POST["txt_mota"]:$data["product"]["mota"];
$txt_create_date=isset($_POST["txt_create_date"])?$_POST["txt_create_date"]:$data["product"]["create_date"];
?>
<div class="product-detail-container">
    <div class="product-image">
        <img src="/phpnangcao/website_mvct4/public/images/<?php echo $txt_hinhanh; ?>" 
             alt="<?php echo $txt_tensp; ?>" />
    </div>
    <div class="product-info">
        <h2 class="product-title"><?php echo $txt_tensp; ?></h2>
        <p class="product-id">Mã sản phẩm: <strong><?php echo $txt_masp; ?></strong></p>
        
        <div class="product-price">
            <?php if ($txt_khuyenmai > 0): ?>
                <p class="old-price"><?php echo number_format($txt_giaxuat, 0, ',', '.'); ?> VND</p>
                <p class="current-price"><?php echo number_format($txt_giaxuat - $txt_khuyenmai, 0, ',', '.'); ?> VND</p>
                <p class="discount">Tiết kiệm: <?php echo number_format($txt_khuyenmai, 0, ',', '.'); ?> VND</p>
            <?php else: ?>
                <p class="current-price"><?php echo number_format($txt_giaxuat, 0, ',', '.'); ?> VND</p>
            <?php endif; ?>
        </div>
        
        <p class="product-description"><?php echo $txt_mota; ?></p>
        
        <a href="<?php echo BASE_URL; ?>/Order/Addtocart/<?php echo $txt_masp; ?>" class="btn-add-to-cart">
            Thêm vào giỏ hàng
        </a>
    </div>
</div>

