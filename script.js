'use strict';

const box = document.getElementById('box');
const raw = document.querySelectorAll('.raw');
const amount = document.querySelectorAll('.amount');
const title = document.querySelectorAll('.title');

for(let i = 0; i < raw.length; i++) {
    raw[i].addEventListener('click', e => {
        if(e.target.className == 'amount') {
            // e.target.style.backgroundColor = 'red';
            let summ = +prompt(`Изменение баланса на счету '${title[i].firstChild.data}'`);
            // console.log(amount.textContent = summ);
            amount[i].textContent = summ.toFixed(1);
        }
    });
}

