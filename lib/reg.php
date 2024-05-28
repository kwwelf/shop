<?php
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($login) < 4) {
    echo "Login error! You must write more than 4 characters.";
    exit;
}
if (strlen($username) < 1) {
    echo "Name error! You must write more than 1 characters.";
    exit;
}
if (strlen($email) < 8 ) {
    echo "Email error! You must write more than 8 characters.";
    exit;
}
if (strlen($password) < 8) {
    echo "Password error! You must write more than 8 characters.";
    exit;
}
//password
$salt = '12345dsuyayw7&&63362GG#@Y@&&#&@@#^^#^$@HY@';
$password = md5($salt . $password);


//Db
$pdo = new PDO('pgsql:host=localhost;dbname=registration;port=5432','pgsql', '');

//insert
$sql = 'INSERT INTO users(login, username, email, password) VALUES(?,?,?,?)';
$query = $pdo -> prepare($sql);
$query->execute([$login, $username,$email,$password]);

header('location: /');