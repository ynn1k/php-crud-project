<?php if ($error) {  echo "<p style='color:red'>Title or Price not set!</p>"; } ?>

<form method="post" enctype="multipart/form-data">
    <h2>Details</h2>
    <div>
        <label for="product-image">Image</label>
        <?php if ($product['image']): ?>
            <img src="<?php echo $image ?>" alt="product image" style="max-width: 250px;max-height: 250px">
        <?php endif; ?>
        <input type="file" id="product-image" name="image">
    </div>
    <div>
        <label for="product-title">Title</label>
        <input type="text" id="product-title" name="title" value="<?php echo $title ?>">
    </div>
    <div>
        <label for="product-description">Description</label>
        <textarea
            name="description"
            id="product-description"
            cols="30"
            rows="10"><?php echo $description ?></textarea>
    </div>
    <div>
        <label for="product-price">Price</label>
        <input type="number" id="product-price" name="price" step=".01" min="0" value="<?php echo $price ?>">
    </div>
    <div>
        <button>Submit</button>
    </div>
</form>
