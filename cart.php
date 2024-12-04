<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);

    if (!in_array($productId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productId; // Add product to the cart
        $response = [
            'status' => 'success',
            'message' => 'Product added to cart successfully!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Product is already in the cart.'
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'No product ID provided.'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>