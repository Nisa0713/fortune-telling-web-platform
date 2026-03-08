<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Tarot Reading | Mystic Tarot</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="tarot-container">

  <h1 class="tarot-title">Your Reading Is Ready ✨</h1>
  <p class="tarot-subtitle">
    Choose the time energy you want to explore.
  </p>

  <div class="reading-box">

    <a href="tarot_final.php?time=past" class="reading-section">
  🌙 Past
</a>

<a href="tarot_final.php?time=present" class="reading-section">
  ✨ Present
</a>

<a href="tarot_final.php?time=future" class="reading-section">
  🔮 Future
</a>


  </div>

  <a href="home.php" class="back-home">
    ← Back to Home
  </a>

</div>

<div class="credit">
  Created by Nisa &amp; Sude
</div>

</body>
</html>




