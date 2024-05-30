
<?php
// DB
require "db.php";
session_start();
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($login) < 4) {
    echo "Login error! You must write more than 4 characters.";
    exit;
}
if (strlen($password) < 8) {
    echo "Password error! You must write more than 8 characters.";
    exit;
}

//password
$salt = '12345dsuyayw7&&63362GG#@Y@&&#&@@#^^#^$@HY@';
$password = md5($salt . $password);


// Auth user

$sql = 'SELECT id FROM users WHERE login = ? AND password = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $password]);

if($query->rowCount()==0)
    echo "there is no such user!";
else {
    setcookie('login', $login, time() + 3600 * 24 * 30,"/");
    header('Location: /user.php');
}



