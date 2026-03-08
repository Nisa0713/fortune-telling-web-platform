<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            header("Location: home.php");
            exit;
        }
    }

    $error = "Invalid email or password";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Mystic Tarot</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div class="login-card">
    <h1>Welcome <span class="heart">💜</span></h1>

    <?php if ($error): ?>
      <p style="color:#ffb3ff; text-align:center; margin-bottom:10px;">
        <?php echo $error; ?>
      </p>
    <?php endif; ?>

    <form method="POST">
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <p>
      Don't have an account?
      <a href="register.php">Sign up</a>
    </p>
  </div>

  <div class="credit">
    Created by Nisa &amp; Sude
  </div>

</body>
</html>



