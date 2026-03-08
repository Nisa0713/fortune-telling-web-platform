<?php
session_start();
require "db.php";

/* Eğer deste yoksa veya bittiyse, yeniden oluştur */
if (!isset($_SESSION['deck']) || count($_SESSION['deck']) === 0) {
    $result = $conn->query("SELECT * FROM tarot_cards");
    $deck = $result->fetch_all(MYSQLI_ASSOC);
    shuffle($deck);
    $_SESSION['deck'] = $deck;
}

/* Desteden 1 kart çek */
$card = array_shift($_SESSION['deck']);

echo json_encode([
    "image_path" => $card['image_path'],
    "card_name"  => $card['card_name']
]);
