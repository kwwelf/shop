<?php
require "db.php";
$followers = trim(filter_var($_POST['followers'], FILTER_SANITIZE_SPECIAL_CHARS));
$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($followers) < 1) {
    $_SESSION['error'] = 'Followers error!';
    header('location: ../trending.php');
}
if(!empty($name)){
    $_SESSION['error'] = 'Name error!';
    header('location: ../trending.php');
}

// DB

//SQL
insert('INSERT INTO games (name, followers) VALUES(:name,:followers)', [
    'name' => $name,
    'followers' => $followers
]);
//$query = $pdo -> prepare($sql);
//$query->execute([$followers]);

header('location: ../trending.php');