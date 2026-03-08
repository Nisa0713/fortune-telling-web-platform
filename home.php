<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

$userName = $_SESSION['username']; // 🔥 ARTIK GERÇEK KULLANICI
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home | Mystic Tarot</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div class="home-container">

    <!-- GREETING -->
    <h1 class="home-greeting">
      Hello <?php echo $userName; ?> ✨
    </h1>

    <p class="home-blessing">
      May the universe guide your energy today.<br>
      Trust your intuition, listen to the signs,<br>
      and let the stars reveal what is meant for you.
    </p>

    <!-- CARDS -->
    <div class="home-cards">

      <!-- TAROT -->
      <a href="tarot.php" class="spirit-card">
        <img src="assets/images/tarot/tarot.png" alt="Tarot Cards">
        <h2>Tarot Reading</h2>
        <p>
          Choose 3 tarot cards and uncover
          the hidden messages waiting for you.
        </p>
      </a>

      <!-- HOROSCOPE -->
      <a href="horoscope.php" class="spirit-card">
        <img src="assets/images/zodiac/zodiac.png" alt="Zodiac Wheel">
        <h2>Daily Horoscope</h2>
        <p>
          Explore the daily messages of the stars
          and align with your cosmic path.
        </p>
      </a>

    </div>

  </div>

  <div class="credit">
    Created by Nisa &amp; Sude
  </div>

</body>
</html>
