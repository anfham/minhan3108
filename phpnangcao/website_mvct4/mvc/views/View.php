<html>
    <head>
        <title></title>
        <link href="<?php echo BASE_URL; ?>/public/style1.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="main">
            <div class="content">
            <?php
                require_once "./mvc/views/front_end/".$data["page"].".php";
            ?>
            </div>
        </div>
    </body>
</html>