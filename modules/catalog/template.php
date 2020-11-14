<?php
 echo 'Шаблон КАТАЛОГА' 
?>

<div id='root-catalog'><div>
<script>	
    const link = document.createElement('link');
	link.rel = 'stylesheet';
	link.href = `${window.location.pathname}/style.css`;
    document.head.appendChild(link);

	function sendData(type, url, callback) {


	    const XHR = new XMLHttpRequest();
	    XHR.addEventListener( "load", function(event) {
	          
	            (callback) ? callback(
	                event.srcElement.response
	            ) : '';

	    });
	    XHR.addEventListener( "error", function( event ) {
	        console.log( 'Oops! Something went wrong.' );
	    } );
	    XHR.open( type , url );
	    XHR.send();

	}

	function createElementGood(data){

		
		let containerCard = document.createElement('div');
        containerCard.className = `container-element ${data.img}`;

        let imgCard = document.createElement('img');
        imgCard.src = `${PROTOCOL}//${HOST}/img/catalog/${data.category}/${data.img}.jpg`;
        containerCard.appendChild(imgCard);

        let titleCard = document.createElement('div');
        titleCard.className = 'container-element__title';
        titleCard.innerText = data.title;
        containerCard.appendChild(titleCard);

        let priceCard = document.createElement('div');
        priceCard.className = 'container-element__price';
        priceCard.innerText = data.price;
        containerCard.appendChild(priceCard);
     	return containerCard;
	}


	sendData(
        'GET',
        `${PROTOCOL}//${HOST}/api/controller.php${window.location.search}&&action=catalog`,
        function(data){
        	const rootCatalog = document.getElementById('root-catalog');
     
        	JSON.parse(data).forEach( function(element){
        		rootCatalog.appendChild(
        			createElementGood(element)
        		);
        	});
        	
        }
    )
	
</script>