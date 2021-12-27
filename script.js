'use strict';

const raw = document.querySelectorAll('.raw'),
      amount = document.querySelectorAll('.amount'),
      title = document.querySelectorAll('.title'),
      edit = document.querySelector('#edit-value');

for(let i = 0; i < raw.length; i++) {
    raw[i].addEventListener('click', e => {
        if(e.target.id == 'edit-value') {
            let sum = +prompt(`Изменение баланса на счету '${title[i].firstChild.data}'`);
            let value = +amount[i].firstChild.data;
            // console.log(typeof(sum));
            if(sum == '' || isNaN(sum) == true) {
                amount[i].textContent = value;
            } else {
                amount[i].textContent = sum;
            }
        }
    });
}

