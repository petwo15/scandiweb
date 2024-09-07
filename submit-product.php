<?php
require_once 'classes/Product.php';
require_once 'classes/Furniture.php';
require_once 'classes/DVD.php';
require_once 'classes/Book.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $product = createProductFromPostData();
        saveProductToDatabase($product);
        echo "Product saved successfully!";
    } catch (InvalidArgumentException $e) {
        echo $e->getMessage();
    }
} else {
    echo "Form not submitted";
}

function createProductFromPostData() {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    if (isset($_POST['productType'])) {
        $type = $_POST['productType'];
    
        if ($type == 'Furniture') {
            if (isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])) {
                $height = $_POST['height'];
                $width = $_POST['width'];
                $length = $_POST['length'];
                return new Furniture($sku, $name, $price, $height, $width, $length);
            } else {
                throw new InvalidArgumentException("Height, width, and length are required for Furniture products");
            }
        } elseif ($type == 'DVD') {
            if (isset($_POST['size'])) {
                $size = $_POST['size'];
                return new DVD($sku, $name, $price, $size);
            } else {
                throw new InvalidArgumentException("Size is required for DVD products");
            }
        } elseif ($type == 'Book') {
            if (isset($_POST['weight'])) {
                $weight = $_POST['weight'];
                return new Book($sku, $name, $price, $weight);
            } else {
                throw new InvalidArgumentException("Weight is required for Book products");
            }
        } else {
            throw new InvalidArgumentException("Invalid product type");
        }
    } else {
        throw new InvalidArgumentException("Product type is required");
    }
}

function saveProductToDatabase($product) {
    $dsn = 'mysql:host=localhost;dbname=products_db';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        $product->save($db);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>