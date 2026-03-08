<?php
require "db.php";

/* 1️⃣ time parametresini ZORUNLU al */
if (!isset($_GET['time'])) {
    header("Location: tarot_result.php");
    exit;
}

$time = $_GET['time'];

/* 2️⃣ SADECE izin verilen değerler */
if (!in_array($time, ['past', 'present', 'future'])) {
    header("Location: tarot_result.php");
    exit;
}

/* 3️⃣ SADECE seçilen kategoriden rastgele 1 fal */
$sql = "
    SELECT reading_text
    FROM tarot_readings
    WHERE time_type = ?
    ORDER BY RAND()
    LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $time);
$stmt->execute();
$result = $stmt->get_result();

/* 4️⃣ DB'den gelen metni al */
$row = $result->fetch_assoc();
$reading = $row['reading_text'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Your Tarot Message ✨</title>

<style>
* { margin:0; padding:0; box-sizing:border-box; }

body {
  height:100vh;
  background: radial-gradient(circle at bottom, #1a2433 0%, #05060b 100%);
  font-family:"Georgia", serif;
  overflow:hidden;
  color:#fff;
}

/* STARS */
.star {
  position:absolute;
  background:white;
  border-radius:50%;
  animation: fall linear infinite;
}

@keyframes fall {
  from { transform: translateY(-100vh); }
  to   { transform: translateY(100vh); }
}

/* CONTENT */
.container {
  position:relative;
  z-index:5;
  height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
}

.message-box {
  max-width:60%;
  background:rgba(255,255,255,0.08);
  backdrop-filter:blur(10px);
  border-radius:18px;
  padding:45px 55px;
  text-align:center;
  box-shadow:0 0 50px rgba(120,90,255,0.35);
}

.message-box h1 {
  font-size:32px;
  margin-bottom:18px;
}

.message-box p {
  font-size:18px;
  line-height:1.9;
}

.credit {
  position:absolute;
  bottom:15px;
  width:100%;
  text-align:center;
  font-size:13px;
  opacity:.6;
  z-index:5;
}
</style>
</head>

<body>

<?php
/* ⭐ 100 yıldız – SONSUZ animasyon */
for ($i=0; $i<100; $i++) {
  $size = rand(1,3);
  $left = rand(0,100);
  $dur = rand(30,120);
  $delay = rand(0,120);
  echo "<div class='star' style='
    width:{$size}px;
    height:{$size}px;
    left:{$left}%;
    animation-duration:{$dur}s;
    animation-delay:-{$delay}s
  '></div>";
}
?>

<div class="container">
  <div class="message-box">
    <h1><?php echo ucfirst($time); ?> Tarot Reading ✨</h1>
    <p><?php echo $reading; ?></p>
  </div>
</div>

<div class="credit">Created by Nisa &amp; Sude</div>

</body>
</html>


