<?php
session_start();

$_SESSION['selected_card'] = $_SESSION['cards'][$_POST['card_index']];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="tarot-container">
<h2>What do you want to know?</h2>

<form action="tarot_result.php" method="post">
  <button name="role" value="past">🌙 Past</button>
  <button name="role" value="present">✨ Present</button>
  <button name="role" value="future">🔮 Future</button>
</form>

</div>
</body>
</html>
