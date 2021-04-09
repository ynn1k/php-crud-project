<?php

/** @var $pdo \PDO */
require_once "../database.php";

$search = $_GET['search'];
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once "../views/partials/header.php" ?>

<h1>Products CRUD</h1>

<p>
    <a href="create.php">Create Product</a>
</p>

<p>
    <form>
        <input type="text" name="search" placeholder="search for product title..." value="<?php echo $search ?>">
    </form>
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

    <?php foreach ($products as $i => $product): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td>
                <?php if ($product['image']): ?>
                    <img src="<?php echo $product['image']; ?>" alt="product image" style="max-width: 50px;max-height: 50px"></td>
                <?php endif; ?>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['create_date']; ?></td>
            <td>
                <form action="delete.php" method="post" style="display: inline">
                    <input type="hidden"
                           name="id"
                           value="<?php echo $product['id'] ?>">
                    <button>Delete</button>
                </form>

                <a href="update.php?id=<?php echo $product['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once "../views/partials/footer.php" ?>
