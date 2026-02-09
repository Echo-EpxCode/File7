<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS file_login_db";
mysqli_query($conn, $sql);

mysqli_select_db($conn, "file_login_db");

$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL ,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $table);
