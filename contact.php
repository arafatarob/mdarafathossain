<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arafat Hossain — Digital Marketer & Frontend Developer</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="./assets/style.css" />
</head>
<body>

    <?php 
      include './landiing_common/header.php';

    ?>

<!-- ══════════ CONTACT ══════════ -->
<section id="contact">
  <div class="inner">
    <div class="contact-info">
      <div class="section-label">Get in Touch</div>
      <h2 class="section-title">Let's Work Together</h2>
      <p class="section-sub">Have a project in mind or want to explore how I can help grow your business? I'd love to hear from you.</p>
      <div class="contact-items">
        <div class="contact-item">
          <div class="ci-icon"><i class="fa fa-envelope"></i></div>
          <div><div class="ci-label">Email</div><div class="ci-value">mdarafathossenarob@gmail.com</div></div>
        </div>
        <div class="contact-item">
          <div class="ci-icon"><i class="fa fa-phone"></i></div>
          <div><div class="ci-label">Phone / WhatsApp</div><div class="ci-value">+880 1746500026</div></div>
        </div>
        <div class="contact-item">
          <div class="ci-icon"><i class="fa fa-map-marker-alt"></i></div>
          <div><div class="ci-label">Location</div><div class="ci-value">Dinajpur, Bangladesh</div></div>
        </div>
      </div>
      <div class="social-links">
        <a target="_blank" href="https://github.com/arafatarob" class="social-link"><i class="fab fa-github"></i></a>
        <a target="_blank" href="https://www.linkedin.com/in/mdarafathossainaofficial/" class="social-link"><i class="fab fa-linkedin-in"></i></a>
        <a target="_blank" href="https://x.com/arafat7690" class="social-link"><i class="fab fa-twitter"></i></a>
        <a target="_blank" href="https://www.facebook.com/md.arafat.hossain.8786/" class="social-link"><i class="fab fa-facebook-f"></i></a>
        <a target="_blank" href="https://wa.me/01746500026" class="social-link"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>

    <div class="contact-form">
      <div class="form-card">
        <div class="form-title">Send Me a Message</div>
            <form action="./action/contact_send.php" method="post">
            <div class="form-row">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="fName" placeholder="John" />
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lName" placeholder="Doe" />
            </div>
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="emailAddress" placeholder="john@example.com" />
            </div>
            <div class="form-group">
              <label>Subject</label>
              <input type="text" name="subject" placeholder="Project inquiry..." />
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea name="message" placeholder="Tell me about your project..."></textarea>
            </div>
            <button type="submit" name="sendContact" class="btn-send"><i class="fa fa-paper-plane"></i> Send Message</button>
          </div>
        </form>
    </div>
  </div>
</section>
</main>

<?php 
  include './landiing_common/footer.php';
?>

  <script src="./assets/script.js"></script>
</body>
</html>