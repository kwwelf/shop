<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's account</title>
    <link rel="stylesheet" href="/assets/index.css">
</head>

<body>
<?php require_once "blocks/header.php"; ?>

<div class="feedback">
    <div class="container">
        <h2>User's account</h2>
        <p> Hi : <b> <?= $_SESSION['user']['username']; ?></b>. </p>

        <form method="post" action="/lib/add-game.php">
            <label>Name</label>
            <input type="text" class="one-line" name="name">

            <label>Followers</label>
            <input name="followers" type="text" class="one-line">

            <button type="submit">Add something </button>
        </form>

    </div>
</div>

<?php require_once "blocks/footer.php"; ?>

</body>