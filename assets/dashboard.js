

document.addEventListener('DOMContentLoaded', function(){
  // sidebar page location js
    const sidebarMenu = document.querySelectorAll('.sidebar_menu ul li a');
    const locationName = window.location.pathname;

    sidebarMenu.forEach(menu => {
      if(menu.href.includes(`${locationName}`)){
        menu.parentElement.classList.add('active');
      }else{
        menu.parentElement.classList.remove('active');
      }
    });



  // toggle theme js
  const toggleInput = document.getElementById('toggleCheck');
  const body = document.body;

  if (toggleInput) {
    toggleInput.addEventListener('change', function () {
      const isDark = !this.checked;
      body.classList.toggle('darkMode', isDark);
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
      body.classList.add('darkMode');
      toggleInput.checked = false;
    } else {
      body.classList.remove('darkMode');
      toggleInput.checked = true;
    }
  }

  // form open js
    const addBox = document.querySelector('.addBox');
    const formContainer = document.querySelector('.form-container');
    const close = document.querySelector('.cross_icon i');

    if (addBox && formContainer) {
      addBox.addEventListener('click', function(){
        formContainer.classList.add('openForm');
      });
    }

    if (close && formContainer) {
      close.addEventListener('click', function(){
        formContainer.classList.remove('openForm');
      });
    }
  });



document.addEventListener('DOMContentLoaded', function(){
  // loading popup
  const body = document.body;
  const div = document.createElement('div');
  div.classList.add('loadingDiv');

  const container = document.createElement('div');
  container.classList.add('container');
  container.innerHTML = '<h2>Loading.......</h2>';

  body.appendChild(div);
  div.appendChild(container);

  const loadingDiv = document.querySelector('.loadingDiv');

    window.addEventListener('load', function(){
      setTimeout(function () {
        loadingDiv.style.display = 'none';
      }, 1500);
    });
});


// form client area on off

const clientInfo = document.querySelector('.clientInfo');
const client = document.getElementById('client');

if (clientInfo && client) {
  client.addEventListener('click', function(){
    clientInfo.classList.toggle('d-block');
  });
}


// order btn js

document.addEventListener('DOMContentLoaded', function(){
  const orderBtn = document.getElementById('orderBtn');
  const appendPopup = document.getElementById('appendPopup');

  if (orderBtn && appendPopup) {
    const mainDivPopup = document.createElement('div');
    mainDivPopup.classList.add('mainDivPopup');

    const popupContainer = document.createElement('div');
    popupContainer.classList.add('popupContainer');

    const image = document.createElement("img");
    image.src = "../assets/img/success_icon.png";
    
    image.style.width = "100px";
    image.style.height = "auto";

    


    const h2 = document.createElement('h2');
    h2.classList.add('submitHeading');
    h2.innerHTML = 'success';

    const h3 = document.createElement('h3');
    h3.classList.add('submitPragraph');
    h3.innerHTML = 'order created';

    appendPopup.appendChild(mainDivPopup);
    mainDivPopup.appendChild(popupContainer);
    popupContainer.appendChild(image);
    popupContainer.appendChild(h2);
    popupContainer.appendChild(h3);

    orderBtn.addEventListener('click', function(event){
      event.preventDefault();
      mainDivPopup.style.display = "block";
      setTimeout (function(){
        document.querySelector('.order_submit')?.submit();
      }, 3000);
    });
  }
});


// profile js

const toggle = document.querySelectorAll('.p-field i');

toggle.forEach(item => {
  item.addEventListener('click', function(e){
    if(e.target.tagName === "I"){
      e.target.classList.toggle('fa-eye');
      e.target.classList.toggle('fa-eye-slash');
      if(e.target.classList.contains('fa-eye'))
      {
        e.target.previousElementSibling.type = "text";
        item.style.color = "var(--cyan)";
      }else{
        e.target.previousElementSibling.type = "password";
      }
    }
  });
});