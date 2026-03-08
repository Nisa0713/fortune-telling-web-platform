<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Mystic Tarot</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div class="login-card">
    <h1>Create Account ✨</h1>

    <form method="POST" action="register_process.php">
      <input type="text" name="username" placeholder="Name" required>
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="password" placeholder="Password" required>

      <button type="submit">Sign Up</button>
    </form>

    <p>
      Already have an account?
      <a href="index.php">Login</a>
    </p>
  </div>

  <div class="credit">
    Created by Nisa &amp; Sude
  </div>

</body>
</html>

