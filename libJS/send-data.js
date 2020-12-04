/**
 * function sendFormData from header sait
 * send form ajax to API
 */
function sendFormData(form, type, url, callback) {

    const overlay = document.querySelector('.overlay');
    const XHR = new XMLHttpRequest();

    XHR.addEventListener("load", function(event) {
        overlay.classList.remove('active');
        popupp.classList.toggle('active');

        (callback) ? callback(
            event.srcElement.response
        ): '';

    });
    XHR.addEventListener("error", function(event) {
        console.log('Oops! Something went wrong.');
    });
    XHR.open(type, url);
    XHR.send(form);
    overlay.classList.add('active');
}

/**
 * function getDataCatalog from header sait
 * get data catalog API
 */
function getDataCatalog(type, url, callback) {

    const XHR = new XMLHttpRequest();
    XHR.addEventListener("load", function(event) {

        (callback) ? callback(
            event.srcElement.response
        ): '';

    });
    XHR.addEventListener("error", function(event) {
        console.log('Oops! Something went wrong.');
    });
    XHR.open(type, url);
    XHR.send();

}

/**
 * function getDataCatalog from header sait
 * get data card API
 */
function getDataCard(type, url, callback) {

    const XHR = new XMLHttpRequest();
    XHR.addEventListener("load", function(event) {

        (callback) ? callback(
            event.srcElement.response
        ): '';

    });
    XHR.addEventListener("error", function(event) {
        console.log('Oops! Something went wrong.');
    });
    XHR.open(type, url);
    XHR.send();

}


/**
 * function getDataCatalog from header sait
 * get data basket API
 */
function getDataBasket(type, url, callback) {

    const XHR = new XMLHttpRequest();
    XHR.addEventListener("load", function(event) {

        (callback) ? callback(
            event.srcElement.response
        ): '';

    });
    XHR.addEventListener("error", function(event) {
        console.log('Oops! Something went wrong.');
    });
    XHR.open(type, url);
    XHR.send();

}