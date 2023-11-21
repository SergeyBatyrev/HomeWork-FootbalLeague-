
let Goals = document.querySelectorAll('.goals');
for (i = 0; i < Goals.length; i++) {
    if (Goals[i].innerText == '') {
        Goals[i].innerHTML = '0';
    }
};

let Summ = document.querySelectorAll('.summa');
for (i = 0; i < Summ.length; i++) {
    if (Summ[i].innerText == '') {
        Summ[i].innerHTML = '0';

    }
};

let Win= document.querySelectorAll('.wins');
for (i = 0; i < Win.length; i++) {
    if (Win[i].innerText == '') {
        Win[i].innerHTML = '0';

    }
};

let lose= document.querySelectorAll('.lose');
for (i = 0; i < lose.length; i++) {
    if (lose[i].innerText == '') {
        lose[i].innerHTML = '0';

    }
};

let nit= document.querySelectorAll('.nitrale');
for (i = 0; i < nit.length; i++) {
    if (nit[i].innerText == '') {
        nit[i].innerHTML = '0';

    }
};

let nitd= document.querySelectorAll('.gg');
for (i = 0; i < nitd.length; i++) {
    if (nitd[i].innerText == '') {
        nitd[i].innerHTML = '0';

    }
};