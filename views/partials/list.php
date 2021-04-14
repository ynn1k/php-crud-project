<h1>Products CRUD</h1>

<p>
    <a href="/product/create">Create Product</a>
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
                    <img src="<?php echo $product['image']; ?>" alt="product image" style="max-width: 50px;max-height: 50px">
                <?php endif; ?>
            </td>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['create_date']; ?></td>
            <td>
                <form action="/product/delete" method="post" style="display: inline">
                    <input type="hidden"
                           name="id"
                           value="<?php echo $product['id'] ?>">
                    <button>Delete</button>
                </form>

                <a href="/product/update?id=<?php echo $product['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>