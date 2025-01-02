<div class="news-container">
    <?php foreach ($data["news"] as $news): ?>
    <div class="news-item">
        <img src="../public/images/<?php echo $news["thumbnail"]; ?>" alt="Thumbnail">
        <div class="news-content">
            <a href="./getNewsDetail/<?php echo $news["id"]; ?>">
                <?php echo $news["title"]; ?>
            </a>
            <div><?php echo $news["summary"]; ?></div>
            <div class="news-meta">
                <?php echo "tác giả: ", $news["author"]; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
