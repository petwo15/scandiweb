<?php
require 'db/db.php';

if (isset($_POST['productIds'])) {
    $productIds = explode(',', $_POST['productIds']);
    $placeholders = implode(',', array_fill(0, count($productIds), '?'));

    $stmt = $pdo->prepare("DELETE FROM products WHERE sku IN ($placeholders)");
    $stmt->execute($productIds);
}

header("Location: index.php");
exit;
?>