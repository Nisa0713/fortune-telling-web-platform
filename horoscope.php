<?php
$horoscopes = [
  "Aries" => "Today is a powerful day to take initiative. Trust your courage.",
  "Taurus" => "Slow down and focus on stability. Small steps bring peace.",
  "Gemini" => "Communication opens new doors today. Speak your truth.",
  "Cancer" => "Protect your energy and listen to your emotions.",
  "Leo" => "Your confidence inspires others. Shine without fear.",
  "Virgo" => "Organization brings clarity. Focus on details calmly.",
  "Libra" => "Balance is key today. Choose harmony over conflict.",
  "Scorpio" => "Deep emotions surface. Transformation is near.",
  "Sagittarius" => "Adventure calls you. Stay open to new experiences.",
  "Capricorn" => "Discipline brings rewards. Stay committed.",
  "Aquarius" => "Your ideas matter. Think freely and boldly.",
  "Pisces" => "Intuition guides you today. Trust your inner voice."
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daily Horoscope | Mystic Tarot</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="horoscope-container">

  <h1 class="tarot-title">Daily Horoscope ✨</h1>
  <p class="tarot-subtitle">
    Discover what the stars reveal for you today.
  </p>

  <div class="horoscope-grid">
    <?php foreach ($horoscopes as $sign => $text): ?>
      <div class="horoscope-card">
        <h2><?php echo $sign; ?></h2>
        <p><?php echo $text; ?></p>
      </div>
    <?php endforeach; ?>
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
