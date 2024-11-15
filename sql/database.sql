CREATE DATABASE products_db;

USE products_db;

CREATE TABLE products (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    currency CHAR(3) NOT NULL,
    quantity INT NOT NULL,
    category_name VARCHAR(255),
    barcode VARCHAR(20),
    description TEXT,
    images JSON
);
