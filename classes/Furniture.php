<?php
require_once 'Product.php';

class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length) {
        parent::__construct($sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO products (sku, name, price, height, width, length) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->height, $this->width, $this->length]);
    }

    public function getSpecialAttributes() {
        return "Dimensions: " . $this->height . "x" . $this->width . "x" . $this->length . " cm";
    }
}
?>