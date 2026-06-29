<?php 
  session_start();
  require("./config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Arafat Hossain — Digital Marketer & Frontend Developer</title>
  <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>

     :root {
     --color-primary: #fff;
     --color-secondary: #000;
     --border: 1px solid rgba(255, 255, 255, 0.5);
     --box-shadow: 0 0 5px #FF5FCF;
     --glow: #FF5FCF;
     --bg-dark-blue: #0b0423;
     --transparent-bg: rgba(255, 255, 255, 0.1);
     --backdrop-filter: blur(10px);
     --border-radius: 8px;
     --dark-red: #c93c60;
     --bg: #050A14;
     --bg2: #080F1E;
     --card: rgba(13, 31, 60, 0.55);
     --cyan: #00E5FF;
     --purple: #A855F7;
     --cyan-dim: rgba(0, 229, 255, 0.12);
     --purple-dim: rgba(168, 85, 247, 0.12);
     --text: #E2E8F0;
     --muted: #8892A4;
     --border: rgba(255, 255, 255, 0.07);
     --glass: rgba(8, 15, 30, 0.7);
     --color-primary: #fff;
 }

    /* ── Account Widget ── */
    .account-widget {
      position: relative;
    }

    .account-trigger {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 6px 12px 6px 6px;
      border-radius: 50px;
      border: 1px solid rgba(0, 229, 200, 0.2);
      background: rgba(255, 255, 255, 0.04);
      cursor: pointer;
      transition: all 0.25s ease;
      backdrop-filter: blur(10px);
    }

    .account-trigger:hover {
      border-color: rgba(0, 229, 200, 0.5);
      background: rgba(0, 229, 200, 0.06);
    }

    .account-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: linear-gradient(135deg, #00e5c8, #8b5cf6);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700;
      font-size: 14px;
      color: #0d0d14;
      flex-shrink: 0;
    }

    .account-info {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .account-name {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: #e8e8f0;
    }

    .account-role {
      font-family: 'Inter', sans-serif;
      font-size: 11px;
      color: #00e5c8;
      text-transform: capitalize;
    }

    .account-chevron {
      font-size: 11px;
      color: rgba(232, 232, 240, 0.5);
      transition: transform 0.3s ease;
      margin-left: 2px;
    }

    .account-chevron.open {
      transform: rotate(180deg);
    }

    /* ── Dropdown ── */
    .account-dropdown {
      position: absolute;
      top: calc(100% + 12px);
      right: 0;
      width: 230px;
      background: rgba(18, 18, 30, 0.92);
      border: 1px solid rgba(0, 229, 200, 0.15);
      border-radius: 16px;
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255,255,255,0.04) inset;
      padding: 8px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-8px) scale(0.97);
      transform-origin: top right;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
      z-index: 9999;
    }

    .account-dropdown.open {
      opacity: 1;
      visibility: visible;
      transform: translateY(0) scale(1);
    }

    .account-dropdown-header {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 10px 12px;
    }

    .account-dropdown-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, #00e5c8, #8b5cf6);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700;
      font-size: 16px;
      color: #0d0d14;
      flex-shrink: 0;
    }

    .dropdown-name {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 14px;
      font-weight: 600;
      color: #e8e8f0;
      margin: 0 0 4px;
    }

    .dropdown-role {
      margin: 0;
    }

    .role-badge {
      font-family: 'Inter', sans-serif;
      font-size: 10px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      background: rgba(0, 229, 200, 0.12);
      color: #00e5c8;
      border: 1px solid rgba(0, 229, 200, 0.25);
      border-radius: 20px;
      padding: 2px 8px;
    }

    .account-dropdown-divider {
      height: 1px;
      background: rgba(255, 255, 255, 0.06);
      margin: 4px 0;
    }

    .dropdown-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 12px;
      border-radius: 10px;
      font-family: 'Inter', sans-serif;
      font-size: 13px;
      font-weight: 500;
      color: rgba(232, 232, 240, 0.8);
      text-decoration: none;
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .dropdown-item i:first-child {
      font-size: 15px;
      width: 18px;
      text-align: center;
      color: rgba(232, 232, 240, 0.5);
      transition: color 0.2s ease;
    }

    .dropdown-item:hover {
      background: rgba(0, 229, 200, 0.07);
      color: #e8e8f0;
    }

    .dropdown-item:hover i:first-child {
      color: #00e5c8;
    }

    .dropdown-arrow {
      margin-left: auto;
      font-size: 10px !important;
      width: auto !important;
      opacity: 0;
      transform: translateX(-4px);
      transition: all 0.2s ease;
      color: rgba(0, 229, 200, 0.6) !important;
    }

    .dropdown-item:hover .dropdown-arrow {
      opacity: 1;
      transform: translateX(0);
    }

    .dropdown-item--danger {
      color: rgba(255, 100, 100, 0.8);
    }

    .dropdown-item--danger i:first-child {
      color: rgba(255, 100, 100, 0.5);
    }

    .dropdown-item--danger:hover {
      background: rgba(255, 80, 80, 0.08);
      color: #ff6464;
    }

    .dropdown-item--danger:hover i:first-child {
      color: #ff6464;
    }
    .loadingDiv {
     background: var(--bg-dark-blue);
     position: fixed;
     left: 0;
     right: 0;
     top: 0;
     bottom: 0;
     z-index: 9999;
     display: flex;
     justify-content: center;
     align-items: center;
 }

 .container {
     width: 90%;
     max-width: 170px;
     background: transparent;
 }

 .container h2 {
     color: var(--color-primary);
     text-align: center;
     font-size: 30px;
     white-space: wrap;
     overflow: hidden;
     width: 0%;
     display: inline-block;

     position: relative;
     animation: text 1s steps(15) forwards;
 }

 @keyframes text {
     0% {
         width: 0%;
     }

     100% {
         width: 100%;
     }
 }

  </style>
</head>
<body>

<!-- MESH BACKGROUND -->
<div class="mesh-bg"></div>

<!-- ══════════ HEADER ══════════ -->
<header>
  <a href="#home" class="logo">Arafat.</a>
  <nav>
    <a href="index.php">Home</a>
    <a href="index.php#about">About</a>
    <a href="index.php#skills">Services</a>
    <a href="index.php#projects">Projects</a>
    <a href="index.php#reviews">Reviews</a>
    <a href="contact.php">Contact</a>
  </nav>

  <?php if (!isset($_SESSION['user_role'])) { ?>

    <div class="header-btns">
      <span class="btn-outline">
        <a href="./auth/login.php">Login</a>
      </span>
      <span class="btn-primary">
        <a href="./auth/user_singup.php">Sign Up</a>
      </span>
    </div>

  <?php } else { ?>

    <div class="account-widget" id="accountWidget">

      <!-- Trigger Button -->
      <div class="account-trigger" onclick="toggleAccountMenu()" id="accountTrigger">
        <div class="account-avatar">
          <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
        </div>
        <div class="account-info">
          <span class="account-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
          <span class="account-role"><?php echo htmlspecialchars($_SESSION['user_role']); ?></span>
        </div>
        <i class="fa-solid fa-chevron-down account-chevron" id="accountChevron"></i>
      </div>

      <!-- Dropdown Menu -->
      <div class="account-dropdown" id="accountDropdown">

        <div class="account-dropdown-header">
          <div class="account-dropdown-avatar">
            <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
          </div>
          <div>
            <p class="dropdown-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
            <p class="dropdown-role">
              <span class="role-badge"><?php echo htmlspecialchars($_SESSION['user_role']); ?></span>
            </p>
          </div>
        </div>

        <div class="account-dropdown-divider"></div>

        <a href="./dashboard/dashboard.php" class="dropdown-item">
          <i class="fa-solid fa-gauge-high"></i>
          <span>Dashboard</span>
          <i class="fa-solid fa-arrow-right dropdown-arrow"></i>
        </a>
        <a href="./dashboard/profile.php" class="dropdown-item">
          <i class="fa-regular fa-user"></i>
          <span>My Profile</span>
          <i class="fa-solid fa-arrow-right dropdown-arrow"></i>
        </a>
        <a href="./dashboard/settings.php" class="dropdown-item">
          <i class="fa-solid fa-gear"></i>
          <span>Settings</span>
          <i class="fa-solid fa-arrow-right dropdown-arrow"></i>
        </a>

        <div class="account-dropdown-divider"></div>

        <a href="./dashboard/common/logout.php" class="dropdown-item dropdown-item--danger">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Log Out</span>
        </a>

      </div>
    </div>

  <?php } ?>

  <div class="hamburger" id="hamburger">
    <span></span><span></span><span></span>
  </div>
</header>

<!-- MOBILE NAV -->
<div class="mobile-nav" id="mobileNav">
  <a href="#home" onclick="closeMobileNav()">Home</a>
  <a href="#about" onclick="closeMobileNav()">About</a>
  <a href="#skills" onclick="closeMobileNav()">Services</a>
  <a href="#projects" onclick="closeMobileNav()">Projects</a>
  <a href="#reviews" onclick="closeMobileNav()">Reviews</a>
  <a href="#contact" onclick="closeMobileNav()">Contact</a>
  <div class="mobile-btns">
    <?php if (!isset($_SESSION['user_role'])) { ?>
      <a href="./auth/login.php" class="btn-outline">Login</a>
      <a href="./auth/user_singup.php" class="btn-primary">Sign Up</a>
    <?php } else { ?>
      <a href="../dashboard/dashboard.php" class="btn-outline">Dashboard</a>
      <a href="./dashboard/common/logout.php" class="btn-primary" style="background:rgba(255,80,80,0.15);border-color:rgba(255,80,80,0.4);color:#ff6464;">Log Out</a>
    <?php } ?>
  </div>
</div>

