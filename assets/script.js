document.addEventListener('DOMContentLoaded', function () {
  // ── HAMBURGER ──
  const hamburger = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobileNav');

  if (hamburger && mobileNav) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      mobileNav.classList.toggle('open');
    });
  }

  function closeMobileNav() {
    if (hamburger) hamburger.classList.remove('active');
    if (mobileNav) mobileNav.classList.remove('open');
  }

  window.closeMobileNav = closeMobileNav;

  // ── PROJECT MODALS ──
  function openModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  document.querySelectorAll('.modal-overlay').forEach(el => {
    el.addEventListener('click', function (e) {
      if (e.target === this) {
        this.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });

  window.openModal = openModal;
  window.closeModal = closeModal;

  // ── AUTH MODALS ──
  function openAuth(type) {
    const modal = document.getElementById('modal-' + type);
    if (modal) {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeAuth(type) {
    const modal = document.getElementById('modal-' + type);
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  function switchAuth(from, to) {
    closeAuth(from);
    setTimeout(() => openAuth(to), 200);
    return false;
  }

  document.querySelectorAll('.auth-overlay').forEach(el => {
    el.addEventListener('click', function (e) {
      if (e.target === this) {
        this.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });

  window.openAuth = openAuth;
  window.closeAuth = closeAuth;
  window.switchAuth = switchAuth;

  // ── PASSWORD TOGGLE ──
  window.togglePw = function (id, icon) {
    const inp = document.getElementById(id);
    if (!inp) return;
    const isText = inp.type === 'text';
    inp.type = isText ? 'password' : 'text';
    icon.innerHTML = isText ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
  };

  // ── SKILL BARS ANIMATION (IntersectionObserver) ──
  const barFills = document.querySelectorAll('.bar-fill');
  if (barFills.length && 'IntersectionObserver' in window) {
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
  }

  // ── SCROLL HEADER SHADOW ──
  const header = document.querySelector('header');
  if (header) {
    window.addEventListener('scroll', () => {
      header.style.boxShadow = window.scrollY > 20 ? '0 4px 30px rgba(0,0,0,0.3)' : 'none';
    });
  }

  // ── CONTACT FORM SEND ──
  const sendButton = document.querySelector('.btn-send');
  if (sendButton) {
    sendButton.addEventListener('click', function () {
      this.innerHTML = '<i class="fa fa-check"></i> Message Sent!';
      this.style.background = 'linear-gradient(135deg, #22c55e, #16a34a)';
      setTimeout(() => {
        this.innerHTML = '<i class="fa fa-paper-plane"></i> Send Message';
        this.style.background = '';
      }, 3000);
    });
  }
});
