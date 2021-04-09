<?php

$pdo = new PDO('mysql:host=db001229.mydbserver.com;port=3306;dbname=usr_p584568_1','p584568d1', '2of-o2ku_ykqtM');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit();
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');
exit();
