<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Arafat Hossain — Digital Marketer & Frontend Developer</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- MESH BACKGROUND -->
<div class="mesh-bg"></div>

<!-- ══════════ HEADER ══════════ -->
<header>
  <a href="#home" class="logo">Arafat.</a>
  <nav>
    <a href="index.php#home">Home</a>
    <a href="index.php#about">About</a>
    <a href="index.php#skills">Services</a>
    <a href="index.php#projects">Projects</a>
    <a href="index.php#reviews">Reviews</a>
    <a href="contact.php">Contact</a>
  </nav>
  <div class="header-btns">
    <span class="btn-outline" style="cursor:default;opacity:0.5;">
      <a href="./auth/login.php">Login</a>
    </span>
    <span class="btn-primary" style="cursor:default;opacity:0.5;">
      <a href="./auth/signup.php">Sign Up</a>
    </span>
  </div>
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
    <span class="btn-outline" style="cursor:default;opacity:0.5;">Login</span>
    <span class="btn-primary" style="cursor:default;opacity:0.5;">Sign Up</span>
  </div>
</div>