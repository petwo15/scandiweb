<?php
require_once 'Product.php';

class DVD extends Product {
    private $size;

    public function __construct($sku, $name, $price, $size) {
        parent::__construct($sku, $name, $price);
        $this->size = $size;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO products (sku, name, price, size) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->size]);
    }

    public function getSpecialAttributes() {
        return "Size: " . $this->size . " MB";
    }
}
?>