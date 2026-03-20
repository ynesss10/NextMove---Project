-- Database untuk Next Move Career Explorer
-- Run this script in phpMyAdmin atau MySQL console

USE career_explorer;

-- Table untuk User Registration & Login
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(150) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Index untuk email (untuk faster lookup saat login)
CREATE INDEX idx_email ON users(email);
