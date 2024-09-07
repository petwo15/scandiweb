CREATE DATABASE products_db;

USE products_db;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    sku VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    size INT DEFAULT NULL,
    weight DECIMAL(10, 2) DEFAULT NULL,
    height DECIMAL(10, 2) DEFAULT NULL,
    width DECIMAL(10, 2) DEFAULT NULL,
    length DECIMAL(10, 2) DEFAULT NULL,
    type VARCHAR(50) NOT NULL
);
