<?php
const DB_PROVIDER = 'pgsql';
const DB_HOST = 'localhost';
const DB_BASENAME = 'reg';
const DB_USERNAME = 'postgres';
const DB_PASSWORD = '';


// $pdo = new PDO('pgsql:host=localhost;dbname=registration;port=5432','pgsql', ''); бывшая дб??

function db_connect() //Функция для соединения с базой данных
{
    $pdo = new PDO(
        DB_PROVIDER . ':host=' . DB_HOST . ';dbname=' . DB_BASENAME,
        DB_USERNAME,
        DB_PASSWORD
    );
    return $pdo;
}
function query($sql, $params = [])
{
    $pdo = db_connect();
    $que = $pdo->prepare($sql);
    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $que->bindValue(':' . $key, $value);
        }
    }
    $que->execute();
    return $que;
}
function select($sql, $params = [])
{
    $que = query($sql, $params);
    $que->setFetchMode(PDO::FETCH_ASSOC);
    return $que->fetchAll();
}
function insert($sql, $params = [])
{
    $pdo = db_connect();
    $que = $pdo->prepare($sql);
    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $que->bindValue(':' . $key, $value);
        }
    }
    $que->execute();
    return $pdo->lastInsertId();
}

function update($sql, $params = [])
{
    $que = query($sql, $params);
    return $que;
}

function delete($sql, $params = [])
{
    $que = query($sql, $params);
    return $que;
}
