

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

    toggleInput.addEventListener("change", function(){
      if (this.checked) {
        body.classList.remove('darkMode');
      }else{
        body.classList.add('darkMode');
      }
      if(body.classList.contains('darkMode')){
        localStorage.setItem('theme', 'dark');
      }else{
        localStorage.setItem('theme', 'light');
      }
    });

    if (localStorage.getItem('theme') === 'dark') {
      body.classList.add('darkMode');
      toggleInput.checked = true;
    }

    const savedTheme = localStorage.getItem('theme');

    if(savedTheme === 'dark'){
      body.classList.add('darkMode');
      toggleInput.checked = false;
    }else{
      body.classList.remove('darkMode');
      toggleInput.checked = true;
    }


    // form open js
    const addBox = document.querySelector('.addBox');
    const formContainer = document.querySelector('.form-container');
    const close = document.querySelector('.cross_icon i');

    addBox.addEventListener('click', function(){
      formContainer.classList.add('openForm');
    });

    close.addEventListener('click', function(){
      formContainer.classList.remove('openForm');
    });




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

client.addEventListener('click', function(){
  clientInfo.classList.toggle('d-block');
});


// order btn js

document.addEventListener('DOMContentLoaded', function(){
  const orderBtn = document.getElementById('orderBtn');
  const appendPopup = document.getElementById('appendPopup');

  const mainDivPopup = document.createElement('div');
  mainDivPopup.classList.add('mainDivPopup');

  const popupContainer = document.createElement('div');
  popupContainer.classList.add('popupContainer');

  const h2 = document.createElement('h2');
  h2.classList.add('submitHeading');
  h2.innerHTML = 'thanks';

  const h3 = document.createElement('h3');
  h3.classList.add('submitPragraph');
  h3.innerHTML = 'order created successfully';

  appendPopup.appendChild(mainDivPopup);
  mainDivPopup.appendChild(popupContainer);
  popupContainer.appendChild(h2);
  popupContainer.appendChild(h3);

  orderBtn.addEventListener('click', function(event){
    event.preventDefault();
    mainDivPopup.style.display = "block";
    setTimeout (function(){
      document.querySelector('.order_submit').submit();
    }, 3000);
  });
});
