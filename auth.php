<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization</title>
    <link rel="stylesheet" href="assets/index.css">
</head>

<body>
<?php require_once "blocks/header.php"; ?>

<div class="feedback">
    <div class="container">
        <h2>Authorization</h2>
        <p>Enter your details here and create new account.</p>

        <form method="post" action="/lib/auth.php">
            <div class="inline">
                <div>
                    <label>Your login</label>
                    <input name="login" type="text">
                </div>
                <div>
                    <label>Password</label>
                    <input name="password" type="password" >
                </div>
            </div>

            <button type="submit">Log in</button>
        </form>
    </div>
</div>

<?php require_once "blocks/footer.php"; ?>

</body>

</html>