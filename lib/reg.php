<?php
//Db
require "db.php";
session_start();

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if (!empty($login)) {
    if (!empty($username)) {
        if (!empty($email)) { // Проверка ФИО на пустоту
            if (!empty($password)) { // Проверка Пароля на пустоту
                $user_id = insert(
                    "INSERT INTO users (username, email, login, password) VALUES (:username, :email, :login, :password)",
                    [
                        'username' => $username,
                        'login' => $login,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT)
                    ]
                );
                $_SESSION['user']['id'] = $user_id;
                header('location: /');
            } else {
                $_SESSION['error'] = "Password?"; //
                header("location: ../reg.php");
            }
        } else {
            $_SESSION['error'] = "Email?"; //
            header("location: ../reg.php");
        }
    } else {
        $_SESSION['error'] = "Username?"; // Создание ключа сессии с ошибкой для пользователя
        header("location: ../reg.php");
    }
} else {
    $_SESSION['error'] = "Login?"; // Создание ключа сессии с ошибкой для пользователя
    header("location: ../reg.php");
}


