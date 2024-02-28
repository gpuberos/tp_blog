<?php

$pdo = new PDO('mysql:dbname=db_blog;host=localhost', 'root', 'root');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $count = $pdo->exec('INSERT INTO articles SET titre="Mon titre", date="' . date('Y-m-d H:i:s') . '"');

$res = $pdo->query('SELECT * FROM articles');

var_dump($res->fetchAll(PDO::FETCH_OBJ));
