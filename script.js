/*
План оптимизации
1) Все повторяющиеся участки кода 
сгруппировать по функциям
2) Рассортировать значения по типу
3) Создать вспомогательные функции
4) Доверстать шапку
5) Доделать функционал запомнить пароль, добавить запоминание в куки 
*/

/* Begin Consts module */
const buttons = document.querySelectorAll('.header__button a');
const popupp = document.querySelector('.popupp-container');
const autorize = popupp.querySelectorAll('button')[0];
const reg = popupp.querySelectorAll('button')[1];
const enter = buttons[0];
/* END Consts module */


/* Begin Function module */
/**
 * function panelSwitch
 * switch active form from header
 */
const panelSwitch = function() {
    document.querySelector(
            '.popupp-container form.active'
        ).classList.remove('active');
    document.getElementById(this.dataset.to).classList.add('active');
}


/**
 * function clickEnter
 * change active element
 */
const clickEnter = function(event){
    event.preventDefault();
    popupp.classList.toggle('active');
}



/**
 * function successAut
 * change locastore user and change form
 */
const successAut = (data) => {
    sessionStorage.setItem('login', data['LOGIN']);
    sessionStorage.setItem('pass', data['PASSWORD']);
    sessionStorage.setItem('name', data['NAME']);
    sessionStorage.setItem('email', data['EMAIL']);
    enter.innerHTML = `${sessionStorage['login']} (Выйти)`;
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
    //Финт костыль
    //window.location.href = window.location.href;
}

/* END Function module */



/*
    - Setting count in basket
    - Click button auth  and reg form
    - clickEnter - open form
    - panelSwitch - switch form aut to reg and reg to auth
    - sessionStorage User - setting sessionStorage User
    - reg onsubmit
    - auth onsubmit
*/
const initStartMain = function(){
    
    if(sessionStorage.getItem('login')){
        document.querySelector(".header__basket span").innerText = JSON.parse( localStorage[sessionStorage.getItem('login')] ).length;
    }
        
    
    autorize.addEventListener("click", panelSwitch)
    reg.addEventListener("click", panelSwitch)
    
    document.querySelector(".header__enter a").addEventListener("click", clickEnter);
    
    
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
    
    
    document.forms.reg.onsubmit = function(e){
        e.preventDefault();
    
        sendFormData(
            new FormData(this),
            'POST',
            `${PROTOCOL}//${HOST}/api/controller.php`
        )
    };
    
    
    document.forms.aut.onsubmit = function(e){
        e.preventDefault();
        sendFormData(
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
    
    if(document.forms.mail_send)
    document.forms.mail_send.onsubmit = function(e){
        e.preventDefault();
        /*
            //1 вариант
            console.log(this);
            //2 вариант
            console.log(document.forms.mail_send);
            //3 вариант
            console.log(document.querySelector("form[id=mail_send]"));
            //4 вариант
            console.log(document.getElementById("mail_send"));
            //5 вариант
            console.log(e.target);
        */
        sendFormData(
            new FormData(this),
            'POST',
            `${PROTOCOL}//${HOST}/api/controller.php`,
            function(response){
                //Временный костыль
                popupp.classList.remove('active');
                response == 1 ? alert('Ваше подписка успешно оформлена!') : alert('Ошибка! Обратитесь в тех. поддержку');
            }
        )
        
    }
}();