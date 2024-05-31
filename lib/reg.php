<?php
//Db
    require "db.php";
    session_start();

    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    if (!empty($login)) {
        if (empty($username)) {
            if (!empty($email)) { // Проверка ФИО на пустоту
                if (!empty($password)) { // Проверка Пароля на пустоту
                    $user_id = insert(
                        "INSERT INTO users (username, login, password) VALUES (:username, :login, :password)",
                        [
                            'username' => $username,
                            'login' => $login,
                            'password' => password_hash($password, PASSWORD_DEFAULT)
                        ]
                    );
                }  else {
                    $_SESSION['error'] = "Password?"; //
                    header("location: ./reg.php");
                }
            } else {
                $_SESSION['error'] = "Username?"; //
                header("location: ./reg.php");
            }
        } else {
            $_SESSION['error'] = "This user already exist"; // Создание ключа сессии с ошибкой для пользователя
            header("location: ./reg.php");
    }




    //if (strlen($login) < 4) {
    //    echo "Login error! You must write more than 4 characters.";
    //    exit;
    //}
    //if (strlen($username) < 1) {
    //    echo "Name error! You must write more than 1 characters.";
    //    exit;
    //}
    //if (strlen($email) < 8 ) {
    //    echo "Email error! You must write more than 8 characters.";
    //    exit;
    //}
    //if (strlen($password) < 8) {
    //    echo "Password error! You must write more than 8 characters.";
    //    exit;
    //}
//password
$salt = '12345dsuyayw7&&63362GG#@Y@&&#&@@#^^#^$@HY@';
$password = md5($salt . $password);

//insert
//$sql = 'INSERT INTO users(login, username, email, password) VALUES(?,?,?,?)';
//$query = $pdo -> prepare($sql);
//$query->execute([$login, $username,$email,$password]);

header('location: /');
?>