<?php
require_once 'Product.php';

class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $weight) {
        parent::__construct($sku, $name, $price);
        $this->weight = $weight;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO products (sku, name, price, weight) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->weight]);
    }

    public function getSpecialAttributes() {
        return "Weight: " . $this->weight . " kg";
    }
}
?>