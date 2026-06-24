<?php

  require('../config/db.php');

?>
<header>
  <div class="welcome">
    welcome <?php echo $_SESSION['user_name']; ?>,
    in your <?php echo $_SESSION['user_role'] ?> dashboard
  </div>
  <div class="account_info">
  <div class="toggle_container">
    <label id="toggle">
        <input type="checkbox" id="toggleCheck">
        <span id="slider"></span>
    </label>
  </div>
  <div class="inner">
    <i class="fa-regular fa-circle-user"></i>
      <div class="account_inner">
        <h2><?php echo $_SESSION['user_name'] ?></h2>
        <h3><?php echo $_SESSION['user_role'] ?></h3>
      </div>
  </div>
  </div>
</header>
