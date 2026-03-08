<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: register.php");
    exit;
}

$username = trim($_POST["username"] ?? "");
$email    = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $email === "" || $password === "") {
    die("All fields are required.");
}

// Şifreyi hashle
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Email kontrolü
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    die("This email is already registered.");
}

// Kullanıcıyı ekle (name KOLONU)
$stmt = $conn->prepare(
    "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if ($stmt->execute()) {
    header("Location: index.php"); // login sayfasına dön
    exit;
} else {
    die("Registration failed.");
}
