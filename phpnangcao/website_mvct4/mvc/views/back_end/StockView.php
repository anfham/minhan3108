<form action="../Stock/search" method="post">
    <input type="text" name="txt_keyword" placeholder="Tìm kiếm sản phẩm..." />
    <select name="txt_status">
        <option value="">Tất cả</option>
        <option value="còn hàng">Còn hàng</option>
        <option value="hết hàng">Hết hàng</option>
    </select>
    <button type="submit">Tìm kiếm</button>
</form>

<table class="product-table">
    <tr>
        <th colspan="8">quản lý tồn kho</th>
    </tr>
    <tr>
        <td>Mã SP</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá nhập</td>
        <td>Giá xuất</td>
        <td>Khuyến mãi</td>
        <td>Thao tác</td>
    </tr>
    <tbody>
        <?php if (isset($data["product"]) && count($data["product"]) > 0): ?>
            <?php foreach($data["product"] as $p): ?>
                <tr class="table-row">
                    <td><?= $p['masp'] ?></td>
                    <td><?= $p['tensp'] ?></td>
                    <td><?= $p['soluong'] ?></td>
                    <td><?= number_format($p['gianhap'], 0, ',', '.') ?> VNĐ</td>
                    <td><?= number_format($p['giaxuat'], 0, ',', '.') ?> VNĐ</td>
                    <td><?= number_format($p['khuyenmai'], 0, ',', '.') ?> VNĐ</td>
                    <td>
                        <form action="../stock/updateStock" method="post">
                            <input type="hidden" name="masp" value="<?= $p['masp'] ?>" />
                            <input type="number" name="soluong" value="<?= $p['soluong'] ?>" />
                            <button type="submit">Cập nhật tồn kho</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Không có sản phẩm phù hợp với tìm kiếm của bạn.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
