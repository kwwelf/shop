<?php
$followers = trim(filter_var($_POST['followers'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($followers) < 1) {
    echo "Followers error.";
    exit;
}

// DB
require "db.php";

//SQL
$sql = 'INSERT INTO trending(followers) VALUES(?,?)';
$query = $pdo -> prepare($sql);
$query->execute([$followers]);

header('location: /trending.php');