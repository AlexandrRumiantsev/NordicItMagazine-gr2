<?php
 echo 'Шаблон КАТАЛОГА'
?>

<div id='root-catalog'></div>
<script>	


/* Begin function block */

/**
 * function sendFormData from header sait
 * send form ajax to API
 */
	function createElementGood(data){

		let containerCard = document.createElement('div');
        containerCard.className = `container-element ${data.img}`;

        let imgCard = document.createElement('img');
        imgCard.src = `${PROTOCOL}//${HOST}/img/catalog/${data.category}/${data.img}.jpg`;
        let imgContainer = document.createElement('div');
        imgContainer.className = 'img-container';
        imgContainer.appendChild(imgCard)
        containerCard.appendChild(imgContainer);

        let titleCard = document.createElement('a');
        titleCard.href=`/card?${data.id}`;
        titleCard.className = 'container-element__title';
        titleCard.innerText = data.title;
        containerCard.appendChild(titleCard);

        let priceCard = document.createElement('div');
        priceCard.className = 'container-element__price';
        priceCard.innerText = data.price;
        containerCard.appendChild(priceCard);
     	return containerCard;
	}

/* END function block */
	

/* 
 - getDataCatalog - get all goods from category
*/    
let initStartCatalog = function(){
   getDataCatalog(
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
}()
</script>