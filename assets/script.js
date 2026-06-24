// ── HAMBURGER ──
  const hamburger = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobileNav');
  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobileNav.classList.toggle('open');
  });
  function closeMobileNav() {
    hamburger.classList.remove('active');
    mobileNav.classList.remove('open');
  }

  // ── PROJECT MODALS ──
  function openModal(id) {
    document.getElementById('modal-' + id).classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeModal(id) {
    document.getElementById('modal-' + id).classList.remove('active');
    document.body.style.overflow = '';
  }
  document.querySelectorAll('.modal-overlay').forEach(el => {
    el.addEventListener('click', function(e) {
      if (e.target === this) {
        this.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });

  // ── AUTH MODALS ──
  function openAuth(type) {
    document.getElementById('modal-' + type).classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeAuth(type) {
    document.getElementById('modal-' + type).classList.remove('active');
    document.body.style.overflow = '';
  }
  function switchAuth(from, to) {
    closeAuth(from);
    setTimeout(() => openAuth(to), 200);
    return false;
  }
  document.querySelectorAll('.auth-overlay').forEach(el => {
    el.addEventListener('click', function(e) {
      if (e.target === this) {
        this.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });

  // ── PASSWORD TOGGLE ──
  function togglePw(id, icon) {
    const inp = document.getElementById(id);
    const isText = inp.type === 'text';
    inp.type = isText ? 'password' : 'text';
    icon.innerHTML = isText ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
  }

  // ── SKILL BARS ANIMATION (IntersectionObserver) ──
  const barFills = document.querySelectorAll('.bar-fill');
  const barObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const fill = entry.target;
        fill.style.width = fill.dataset.width + '%';
        barObserver.unobserve(fill);
      }
    });
  }, { threshold: 0.3 });
  barFills.forEach(f => barObserver.observe(f));

  // ── SCROLL HEADER SHADOW ──
  window.addEventListener('scroll', () => {
    const h = document.querySelector('header');
    h.style.boxShadow = window.scrollY > 20 ? '0 4px 30px rgba(0,0,0,0.3)' : 'none';
  });

  // ── CONTACT FORM SEND ──
  document.querySelector('.btn-send').addEventListener('click', function() {
    this.innerHTML = '<i class="fa fa-check"></i> Message Sent!';
    this.style.background = 'linear-gradient(135deg, #22c55e, #16a34a)';
    setTimeout(() => {
      this.innerHTML = '<i class="fa fa-paper-plane"></i> Send Message';
      this.style.background = '';
    }, 3000);
  });


  