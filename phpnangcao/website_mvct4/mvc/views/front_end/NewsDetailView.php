<?php
$txt_title = isset($_POST["txt_title"])?$_POST["txt_title"]:$data ["newsDetail"]["title"];
$txt_summary = isset($_POST["txt_summary"])?$_POST["txt_summary"]:$data["newsDetail"]["summary"];
$txt_content = isset($_POST["txt_content"])?$_POST["txt_content"]:$data["newsDetail"]["content"];
$txt_thumbnail=isset($_POST["txt_thumbnail"])?$_POST["txt_thumbnail"]:$data["newsDetail"]["thumbnail"];
$txt_author = isset($_POST["txt_author"])?($_POST["txt_author"]):$data["newsDetail"]["author"];
$txt_status = isset($_POST["txt_status"])?($_POST["txt_status"]):$data["newsDetail"]["status"];
?>
<div class="container">
    <h1 class="news-title"><?php echo $txt_title; ?></h1>

    <div class="news-thumbnail">
        <img src="/phpnangcao/website_mvct4/public/images/<?php echo $txt_thumbnail; ?>" alt="Thumbnail" />
    </div>

    <p class="news-summary"><?php echo $txt_summary; ?></p>

    <div class="news-content">
        <?php echo $txt_content; ?>
    </div>

    <div class="news-author">
        <p>Tác giả: <?php echo $txt_author; ?></p>
    </div>
</div>
