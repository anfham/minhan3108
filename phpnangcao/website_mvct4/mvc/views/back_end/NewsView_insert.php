<tr>
    <td colspan="5">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="product-table">
            <tr>
                <td>Tiêu đề</td>
                <td><input name ="txt_title"type = "text" placeholder="nhập tiêu đề"/></td> 
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td>
                    <textarea name="txt_summary" cols="50" rows="10" placeholder="Nhập tóm tắt ngắn gọn về bài viết..."></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td>
                    <textarea name="txt_content" cols="50" rows="10" placeholder="Nhập nội dung chi tiết của bài viết..."></textarea>
                </td>
            </tr>
            </tr>   
            <tr>
                <td>thumbnail</td>
                <td><input name ="txt_thumbnail"type = "file" /></td> 
            </tr>
            <tr>
                <td>tác giả</td>
                <td><input name ="txt_author"type = "text" placeholder="nhập tên tác giả"/></td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <select name="txt_status">
                        <option value="đăng">Đăng</option>
                        <option value="nháp">Nháp</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" value="Thêm"/>
                    <input type="reset" name="reset" value="Reset"/>
                </td>
            </tr>
            </table>
        </form>
    </td>
</tr>