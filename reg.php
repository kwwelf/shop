<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/index.css">
</head>

<body>
<?php require_once "blocks/header.php"; ?>

<div class="feedback">
    <div class="container">
        <h2>Registration!</h2>
        <p>Enter your details here and create new account.</p>

        <form>
            <div class="inline">
                <div>
                    <label>Your login</label>
                    <input type="text">
                </div>
                <div>
                    <label>Name</label>
                    <input type="text">
                </div>
            </div>
            <label>Email Address</label>
            <input type="email" class="one-line">

            <label>Password</label>
            <input type="password" class="one-line">

            <button type="button">Create new account</button>
        </form>
    </div>
</div>

<?php require_once "blocks/footer.php"; ?>

</body>

</html>