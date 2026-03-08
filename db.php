<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "astrofal_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection Failed");
}

$conn->set_charset("utf8mb4");



