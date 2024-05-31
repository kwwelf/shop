
<?php
// DB
require "db.php";
session_start();
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

//if (strlen($login) < 4) {
//    echo "Login error! You must write more than 4 characters.";
//    exit;
//}
//if (strlen($password) < 8) {
//    echo "Password error! You must write more than 8 characters.";
//    exit;
//}
if (!empty($login)) { // Проверка логина на пустоту
    $user = select('SELECT * FROM users WHERE login = :login', ['login' => $login]); // Получаем данные о пользователе из бд
    if (!empty($user)) {
        if (!empty($password)) {
            if (password_verify($password, $user[0]['password'])) {
                $_SESSION['user']['id'] = $user[0]['id'];
                header('location: ../');
            } else {
                $_SESSION['error'] = 'Неверный пароль!';
                header('location: ../pages/auth.php');
            }
        } else {
            $_SESSION['error'] = 'Необходимо ввести пароль!';
            header('location: ./auth.php');
        }
    } else {
        $_SESSION['error'] = 'Пользователь не найден!'; // Создание сессии для ошибки
        header('location: ./auth.php'); // Переадресация пользователя на страницу авторизации
    }
} else {
    $_SESSION['error'] = 'Необходимо ввести логин!'; // Создание сессии для ошибки
    header('location: ./auth.php'); // Переадресация пользователя на страницу авторизации
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



