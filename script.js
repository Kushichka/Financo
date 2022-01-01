'use strict';

const loginBtn = document.getElementById('login-btn'),
      loginDropDown = document.querySelector('.login__wrapper-dropdown'),
      navbar = document.querySelector('.navbar'),
      menuBtn = document.querySelectorAll('.menu__btn');

loginBtn.addEventListener('click', e => {
    if(loginDropDown.style.display == 'block') {
        loginDropDown.style.display = 'none';
    } else {
        loginDropDown.style.display = 'block';
    }
});

navbar.addEventListener('click', e => {
    if(e.target.className == 'menu__btn') {
        menuBtn.forEach(item => {
            if(item.classList.contains('active__btn')) {
                item.classList.remove('active__btn');
            }
        });
        e.target.classList.add('active__btn');
    }
});

