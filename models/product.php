<?php
require_once __DIR__ . '/../config/Database.php';


class Product
{
    public static function add($productData)
    {
        $db = Database::getInstance()->getConnection();

        $sql = "INSERT INTO products (id, name, price, currency, quantity, category_name, barcode, description, images) 
                VALUES (:id, :name, :price, :currency, :quantity, :category_name, :barcode, :description, :images)";

        $stmt = $db->prepare($sql);

        // Преобразуем изображения в JSON формат для хранения
        $images = json_encode($productData['images']);

        $stmt->bindParam(':id', $productData['id']);
        $stmt->bindParam(':name', $productData['name']);
        $stmt->bindParam(':price', $productData['price']);
        $stmt->bindParam(':currency', $productData['currency']);
        $stmt->bindParam(':quantity', $productData['quantity']);
        $stmt->bindParam(':category_name', $productData['category_name']);
        $stmt->bindParam(':barcode', $productData['barcode']);
        $stmt->bindParam(':description', $productData['description']);
        $stmt->bindParam(':images', $images);

        return $stmt->execute();
    }
}
?>
