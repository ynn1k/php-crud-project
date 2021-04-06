<?php

$pdo = new PDO('mysql:host=db001229.mydbserver.com;port=3306;dbname=usr_p584568_1','p584568d1', '2of-o2ku_ykqtM');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<details style='background:cadetblue'>";
echo "<summary>dump</summary>";
echo "<pre>";
echo var_dump($products);
echo "</pre>";
echo "</details>";

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

    <title>Products CRUD</title>
</head>
<body>
    <h1>Products CRUD</h1>

    <p>
        <a href="create.php">Create Product</a>
    </p>

    <table>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Create Date</th>
            <th>Action</th>
        </tr>

        <?php foreach ($products as $i => $product) { ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $product['image']; ?></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['create_date']; ?></td>
                <td><button>Edit</button> <button>Delete</button></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>