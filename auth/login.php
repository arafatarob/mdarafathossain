<?php
    require '../config/db.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="link_container">
        <a href="../index.php"><i class="fa-solid fa-chevron-left"></i> home</a>
    </div>

    <!-- Login Modal -->
<div class="auth-overlay" id="modal-login">
  <div class="auth-box">
    <div class="auth-logo">Arafat.</div>
    <div class="auth-title">Welcome Back</div>
    <div class="auth-sub">Sign in to your account</div>
    <form class="" action="../action/login_submit.php" method="post">
      <div class="auth-field">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="you@example.com" />
      </div>
      <div class="auth-field">
        <label>Password</label>
        <input type="password" name="password" id="loginPw" placeholder="••••••••" />
        <span class="pw-toggle" onclick="togglePw('loginPw', this)"><i class="fa fa-eye"></i></span>
      </div>
      <div class="auth-row">
        <label class="auth-check"><input type="checkbox"> Remember Me</label>
        <a href="#" class="auth-forgot">Forgot Password?</a>
      </div>
      <button class="btn-auth" type="submit" name="loginSubmit">Sign In</button>
    </form>
    <div class="divider"><span>or</span></div>
    <div class="auth-switch">Don't have an account? <a href="#" onclick="switchAuth('login','signup')">Sign Up</a></div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/script.js"></script>
</body>
</html>
