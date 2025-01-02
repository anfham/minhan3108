<?php
$txt_title = isset($_POST["txt_title"])?$_POST["txt_title"]:$data ["news"]["title"];
$txt_summary = isset($_POST["txt_summary"])?$_POST["txt_summary"]:$data["news"]["summary"];
$txt_content = isset($_POST["txt_content"])?$_POST["txt_content"]:$data["news"]["content"];
$txt_thumbnail=isset($_POST["txt_thumbnail"])?$_POST["txt_thumbnail"]:$data["news"]["thumbnail"];
$txt_author = isset($_POST["txt_author"])?($_POST["txt_author"]):$data["news"]["author"];
$txt_status = isset($_POST["txt_status"])?($_POST["txt_status"]):$data["news"]["status"];
?>
<tr>
    <td colspan="5">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="product-table">
            <tr>
                <td>Tiêu đề</td>
                <td><input name ="txt_title"type = "text" value="<?php echo $txt_title; ?>"/></td> 
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td>
                    <textarea name="txt_summary" cols="50" rows="10"><?php echo $txt_summary; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td>
                    <textarea name="txt_content" cols="50" rows="10"><?php echo $txt_content; ?></textarea>
                </td>
            </tr>
            </tr>   
            <tr>
                <td>thumbnail hiện tại</td>
                <td>
                    <img src="/phpnangcao/website_mvct4/public/images/<?php echo $txt_thumbnail; ?>" width="500px" height="300px" />
                </td>
            </tr>
            <tr>
                <td>thumbnail</td>
                <td><input name ="txt_thumbnail"type = "file" /></td> 
            </tr>
            <tr>
                <td>tác giả</td>
                <td><input name ="txt_author"type = "text" value="<?php echo $txt_author; ?>"/></td>
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
                    <input type="submit" name="btn_submit" value="update"/>
                    <input type="reset" name="reset" value="Reset"/>
                </td>
            </tr>
            </table>
        </form>
    </td>
</tr>