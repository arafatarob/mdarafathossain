<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/style.css">
  </head>
  <body>
    <div class="link_container">
        <a href="../index.php"><i class="fa-solid fa-chevron-left"></i> home</a>
    </div>
    <!-- Signup Modal -->
    <div class="auth-overlay" id="modal-signup">
      <div class="auth-box">
        <div class="auth-logo">Arafat.</div>
        <div class="auth-title">Create Account</div>
        <div class="auth-sub">Join and get started today</div>
        <form class="" action="../action/user_submit.php" method="post">
          <div class="auth-field">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Your full name" />
          </div>
          <div class="auth-field">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="you@example.com" />
          </div>
          <div class="auth-field">
            <label>Role</label>
            <select class="" name="role">
              <option value="3">User</option>
            </select>
          </div>
          <div class="auth-field">
            <label>Password</label>
            <input type="password" name="password" id="signupPw" placeholder="Min. 8 characters" />
            <span class="pw-toggle" onclick="togglePw('signupPw', this)"><i class="fa fa-eye"></i></span>
          </div>
          <div class="auth-row">
            <label class="auth-check"><input type="checkbox"> I agree to Terms & Privacy Policy</label>
          </div>
          <button class="btn-auth" type="submit" name="user_submit">Create Account</button>
        </form>

        <div class="divider"><span>or</span></div>
        <div class="auth-switch">Already have an account? <a href="login.php">Sign In</a></div>
      </div>
    </div>

<script src="../assets/js/script.js" charset="utf-8"></script>
  </body>
</html>
