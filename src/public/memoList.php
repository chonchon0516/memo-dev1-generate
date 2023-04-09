<?php
$user = 'root';
$password = 'password';
$pdo = new PDO('mysql:host=mysql; dbname=memo; charset=utf8', $user, $password);

$sql = 'select * from pages';
$statement = $pdo->prepare($sql);
$statement->execute();
$memos = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($memos);