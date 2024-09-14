<?php
$product_id = $this->uri->segment(3); // Get product ID from URL
$product = $this->product_model->get_product_by_id($product_id); // Fetch product details from model
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name']; ?></title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <h1><?= $product['name']; ?></h1>
    <p><?= $product['description']; ?></p>
    <p>Price: <?= number_format($product['price'], 2); ?> ฿</p>

    <form method="POST" action="<?= base_url('shop/add_to_cart'); ?>" class="add-to-cart-form">
        <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" value="1">
        <button type="submit" class="add-button">
            Add to Cart
        </button>
    </form>

    <a href="<?= base_url('shop'); ?>">Back to Shop</a>
</body>
</html>
