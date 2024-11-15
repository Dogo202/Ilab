<?php
require_once __DIR__ . '/../models/Product.php';

$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

$requiredFields = ['id', 'name', 'price', 'currency', 'quantity', 'category_name', 'barcode', 'description', 'images'];

if (!isset($data['products']) || !is_array($data['products'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data format.']);
    exit;
}

foreach ($data['products'] as $productData) {
    foreach ($requiredFields as $field) {
        if (!isset($productData[$field])) {
            echo json_encode(['status' => 'error', 'message' => "Missing field: $field"]);
            exit;
        }
    }

    $result = Product::add($productData);

    if (!$result) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add product.']);
        exit;
    }
}

echo json_encode(['status' => 'success', 'message' => 'Product(s) added successfully.']);

