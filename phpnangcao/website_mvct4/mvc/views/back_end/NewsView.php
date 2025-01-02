<?php
$obj = new News;
?>
<form action="" method="post">
    <?php if (empty($data["news"])): ?>
        <p>Chưa có bài đăng nào.</p>
        <?php else: ?>
            <table class="product-table">
                <tr>
                    <th colspan="8">Danh sách bài đăng</th>
                </tr>
                <tr class="table-header">
                    <td>ID</td>
                    <td>Tiêu đề</td>
                    <td>Tóm tắt</td>
                    <td>thumbnail</td>
                    <td>Tác giả</td>
                    <td>Trạng thái</td>
                    <td>Sửa</td>  
                    <td>Xóa</td>  
                </tr>
                <?php foreach ($data["news"] as $news): ?>
                <tr class="table-row">
                    <td><?php echo $news["id"]; ?></td>
                    <td><?php echo $news["title"]; ?></td>
                    <td><?php echo $news["summary"]; ?></td>
                    <td>
                        <img src="../public/images/<?php echo $news ["thumbnail"]; ?>" width="100" height="100"/>
                    </td>
                    <td><?php echo $news["author"]; ?></td>
                    <td><?php echo $news["status"]; ?></td>
                    <td>
                        <a href="./update/<?php echo $news["id"]; ?>" class="btn-update">Sửa</a>    
                    </td>
                    <td>
                        <a href="./delete/<?php echo $news["id"]; ?>" class="btn-delete">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
    <?php endif; ?>
    <div class="add-product-link">
            <a href="./insert/">Thêm tin</a>
    </div>
</form>