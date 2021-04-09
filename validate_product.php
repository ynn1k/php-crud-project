<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title =        $_POST['title'];
    $description =  $_POST['description'];
    $price =        $_POST['price'];

    $image =        $_FILES['image'] ?? null;
    $imagePath = '';

    if (!$title || !$price) {
        $error = true;
    } else {
        $imagePath = $product['image'];

        if ($image['tmp_name']) {
            if (!is_dir(__DIR__.'/public/'.'images')) {mkdir(__DIR__.'/public/'.'images');}

            unlink(__DIR__.'/public/'.$product['image']);

            $imagePath = 'images/'.uniqid('', true).'/'.$image['name'];

            mkdir(dirname(__DIR__.'/public/'.$imagePath));
            move_uploaded_file($image['tmp_name'], __DIR__.'/public/'.$imagePath);
        }
    }
}
