<?php

$pdo = new PDO('mysql:host=db001229.mydbserver.com;port=3306;dbname=usr_p584568_1','p584568d1', '2of-o2ku_ykqtM');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "<details style='background:cadetblue'>";
echo "<summary>dump</summary>";
echo "<pre>";
echo var_dump($_POST);
echo "</pre>";
echo "</details>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    if (!$title || !$price) {
        echo "<p style='color:red'>Title or Price not set!</p>";
    } else {
        $statement = $pdo->prepare("INSERT INTO products (title, image , description, price, create_date) VALUES (:title, :image, :description, :price, :date)");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', NULL);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);

        $statement->execute();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">

    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <title>Products CRUD | Create Product</title>
</head>
<body>
    <h1>Create Product</h1>

    <form action="create.php" method="post">
        <h2>Details</h2>
        <div>
            <label for="product-image">Image</label>
            <input type="file" id="product-image" name="image">
        </div>
        <div>
            <label for="product-title">Title</label>
            <input type="text" id="product-title" name="title" value="<?php echo $_POST['title'] ?>">
        </div>
        <div>
            <label for="product-description">Description</label>
            <textarea
                name="description"
                id="product-description"
                cols="30"
                rows="10"><?php echo $_POST['description'] ?></textarea>
        </div>
        <div>
            <label for="product-price">Price</label>
            <input type="number" id="product-price" name="price" step=".01" min="0" value="<?php echo $_POST['price'] ?>">
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</body>
</html>