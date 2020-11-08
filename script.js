const HOST = window.location.host;
const PROTOCOL = window.location.protocol;


const panelSwitch = function() {
    document.querySelector(
            '.popupp-container form.active'
        ).classList.remove('active');
    document.getElementById(this.dataset.to).classList.add('active');
}

const buttons = document.querySelectorAll('.header__button a');
const enter = buttons[0];
const popupp = document.querySelector('.popupp-container');

const autorize = popupp.querySelectorAll('button')[0];
const reg = popupp.querySelectorAll('button')[1];

autorize.addEventListener("click", panelSwitch)
reg.addEventListener("click", panelSwitch)

enter.addEventListener("click", function(event){
    event.preventDefault();
    popupp.classList.toggle('active');
});




function sendData(form, type, url) {

    const overlay = document.querySelector('.overlay');

    const XHR = new XMLHttpRequest();
    XHR.addEventListener( "load", function(event) {
      console.log(event.srcElement.response);
      overlay.classList.remove('active');
      popupp.classList.toggle('active');
    } );
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


document.forms.aut.onsubmit = function(e){
    e.preventDefault();

    sendData(
        new FormData(this),
        'POST',
        `${PROTOCOL}//${HOST}/api/controller.php`
    )
};