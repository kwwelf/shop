<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Website</title>
    <link rel="stylesheet" href="assets/index.css">
</head>

<body>
<div class="wrapper">
    <?php require_once "blocks/header.php"; ?>

    <div class="container trending">
        <h3>Currently Trending Games</h3>

        <div class="games">
            <?php
            //db
            require_once "lib/db.php";
            //sql
            $sql = 'SELECT * FROM trending ORDER BY id  DESC';
            $query = $pdo->prepare($sql);
            $query ->execute();
            $games = $query-> fetchAll(PDO::FETCH_OBJ);
            foreach ($games as $el)
                echo '
            <div class="block">
                <img src="assets/img/ '.$el->image.' " alt="">
                <span><img src="assets/img/fire.svg" alt="">'.$el -> followers.' 40 Followers</span>
                    </div>';
            ?>
        </div>
    </div>
</div>


<?php require_once "blocks/footer.php"; ?>

</body>

</html>