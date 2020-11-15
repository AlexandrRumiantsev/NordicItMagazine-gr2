/*
План оптимизации
1) Все повторяющиеся участки кода 
сгруппировать по функциям
2) Рассортировать значения по типу
3) Создать вспомогательные функции
4) Доверстать шапку
5) Доделать функционал запомнить пароль, добавить запоминание в куки 
*/


const HOST = window.location.host;
const PROTOCOL = window.location.protocol;


const panelSwitch = function() {
    document.querySelector(
            '.popupp-container form.active'
        ).classList.remove('active');
    document.getElementById(this.dataset.to).classList.add('active');
}

const buttons = document.querySelectorAll('.header__button a');




const popupp = document.querySelector('.popupp-container');

const autorize = popupp.querySelectorAll('button')[0];
const reg = popupp.querySelectorAll('button')[1];

const clickEnter = function(event){
    event.preventDefault();
    popupp.classList.toggle('active');
}

autorize.addEventListener("click", panelSwitch)
reg.addEventListener("click", panelSwitch)

const enter = buttons[0];
enter.addEventListener("click", clickEnter);


if(sessionStorage.getItem('login')){
  
  enter.innerHTML = `${sessionStorage.getItem('login')}(Выйти)`; 
  enter.removeEventListener("click", clickEnter)
  enter.onclick = function(e){
    e.preventDefault();
    sessionStorage.removeItem('login');
    sessionStorage.removeItem('pass');
    sessionStorage.removeItem('name');
    sessionStorage.removeItem('email');
    enter.innerHTML = 'Войти';
    enter.addEventListener("click", clickEnter);
   }
}




function sendData(form, type, url, callback) {

    const overlay = document.querySelector('.overlay');

    const XHR = new XMLHttpRequest();
    XHR.addEventListener( "load", function(event) {
          overlay.classList.remove('active');
          popupp.classList.toggle('active');

            (callback) ? callback(
                event.srcElement.response
            ) : '';

    });
    XHR.addEventListener( "error", function( event ) {
        console.log( 'Oops! Something went wrong.' );
    } );
    XHR.open( type, url );
    XHR.send( form );
    overlay.classList.add('active');
}


document.forms.reg.onsubmit = function(e){
    e.preventDefault();

    sendData(
        new FormData(this),
        'POST',
        `${PROTOCOL}//${HOST}/api/controller.php`
    )
};

const successAut = (data) => {
    sessionStorage.setItem('login', data['LOGIN']);
    sessionStorage.setItem('pass', data['PASSWORD']);
    sessionStorage.setItem('name', data['NAME']);
    sessionStorage.setItem('email', data['EMAIL']);
    enter.innerHTML = `${sessionStorage['login']} (Выйти)`;
    enter.removeEventListener("click", clickEnter)
    console.log(data)
    enter.onclick = function(e){
        e.preventDefault();
        sessionStorage.removeItem('login');
        sessionStorage.removeItem('pass');
        sessionStorage.removeItem('name');
        sessionStorage.removeItem('email');
        enter.innerHTML = 'Войти';
        enter.addEventListener("click", clickEnter);   
    }
}

document.forms.aut.onsubmit = function(e){
    e.preventDefault();
    sendData(
        new FormData(this),
        'POST',
        `${PROTOCOL}//${HOST}/api/controller.php`,
        function(response){
            (response == "USER NOT FOUND") 
            ? alert('Пользователь не найдер в системе')
            : successAut(JSON.parse(response))
        }
    )
};