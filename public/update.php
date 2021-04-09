<?php

/** @var $pdo \PDO */
require_once "../database.php";

$error = false;

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit();
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$title = $product['title'];
$image = $product['image'];
$description = $product['description'];
$price = $product['price'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../validate_product.php";

    if (!$error) {
        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();

        header('Location: index.php');
        exit();
    }
}

?>

<?php include_once "../views/partials/header.php" ?>

<h1>Update Product</h1>

<?php include_once "../views/partials/form.php" ?>

<?php include_once "../views/partials/footer.php" ?>
