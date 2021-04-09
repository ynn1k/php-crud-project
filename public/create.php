<?php

/** @var $pdo \PDO */
require_once "../database.php";

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../validate_product.php";

    if (!$error) {
        $statement = $pdo->prepare("INSERT INTO products (title, image , description, price, create_date) VALUES (:title, :image, :description, :price, :date)");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();

        header('Location: index.php');
        exit();
    }
}

?>

<?php include_once "../views/partials/header.php" ?>

<h1>Create Product</h1>

<?php include_once "../views/partials/form.php" ?>

<?php include_once "../views/partials/footer.php" ?>
