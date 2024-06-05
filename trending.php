<?php
require_once "lib/db.php";
session_start();
empty($_SESSION['user']) ? header('location: /auth.php') : null;
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
            $games = select('SELECT * FROM games ORDER BY id  DESC');
            foreach ($games as $el) {
                echo '
                    <div class="block">
                        <h3>' . $el['name'] . '</h3>
                        <span><img src="assets/img/fire.svg" alt="">' . $el['followers'] . '</span>
                    </div>
                    ';
            }
            ?>
        </div>
    </div>
</div>


<?php require_once "blocks/footer.php"; ?>

</body>

</html>