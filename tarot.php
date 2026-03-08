<?php
session_start();
require "db.php";

/*
  1) Eğer destemiz yoksa:
     - SQL'den 22 kartı al
     - Karıştır
     - Session'a koy
*/
if (!isset($_SESSION['deck'])) {
    $result = $conn->query("SELECT * FROM tarot_cards");
    $deck = $result->fetch_all(MYSQLI_ASSOC);
    shuffle($deck);

    $_SESSION['deck'] = $deck;   // 22 kart
    $_SESSION['picked'] = [];    // açılanlar
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tarot Reading</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="tarot-container">
    <h1 class="tarot-title">Your Tarot Cards ✨</h1>
    <p class="tarot-subtitle">The universe has chosen these cards for you.</p>

    <div class="tarot-cards">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="tarot-card" data-index="<?= $i ?>"></div>
        <?php endfor; ?>
    </div>

    <button id="revealBtn">Reveal My Reading</button>
</div>

<div class="credit">Created by Nisa &amp; Sude</div>

<script>
let openedCards = 0;

document.querySelectorAll('.tarot-card').forEach(card => {
    card.addEventListener('click', () => {

        if (card.classList.contains('opened')) return;
        if (openedCards >= 3) return;

        fetch('pick_card.php')
            .then(res => res.json())
            .then(data => {
                card.classList.add('opened');
                card.style.backgroundImage = `url(${data.image_path})`;
                card.style.backgroundSize = 'cover';
                card.style.backgroundPosition = 'center';
                openedCards++;
            });
    });
});

document.getElementById('revealBtn').addEventListener('click', () => {
    if (openedCards === 3) {
        window.location.href = 'tarot_result.php';
    } else {
        alert('Please select 3 cards');
    }
});
</script>

</body>
</html>





