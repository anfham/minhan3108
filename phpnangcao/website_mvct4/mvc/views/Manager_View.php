<html>
    <head>
        <title>Quản trị</title>
        <link href="<?php echo BASE_URL; ?>/public/style1.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="main">
            <div class="header">
            <?php
                require_once "./mvc/views/pages/menu_backendView.php";
            ?>
            </div>
            <div class="content">
            <?php
                require_once "./mvc/views/back_end/".$data["page"].".php";
            ?>
            </div>
            <div class="footer">@copyright Phạm Minh An</div>
        </div>
    </body>
</html>
