<div id='root-basket' class='basket'></div>
<script>
   
	const ROOT_BASKET = document.getElementById('root-basket');

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


   Object.keys(localStorage).forEach(id => {
   		
   		sendData(
		'GET',
		`${PROTOCOL}//${HOST}/api/controller.php?action=card&&id=${id}`,
		function(data){
			//ROOT_BASKET

			let dataGood = JSON.parse(data);
			console.log(dataGood);
			let containerElem = document.createElement('div');	
			containerElem.className = 'basket__item';


			let containerImg = document.createElement('img');	
			containerImg.className = 'basket__item--img';
			containerImg.src= `${PROTOCOL}//${HOST}/img/catalog/${dataGood.category}/${dataGood.img}.jpg`;
			containerElem.appendChild(containerImg);



			let containerName = document.createElement('div');	
			containerName.className = 'basket__item--name';
			containerName.innerText= dataGood.title;
			containerElem.appendChild(containerName);


			let sizeElem = document.createElement('div');	
			sizeElem.className = 'basket__item--size';
			sizeElem.innerText= dataGood.sizes;
			containerElem.appendChild(sizeElem);


			let countElem = document.createElement('div');	
			countElem.className = 'basket__item--count';
			countElem.innerText= localStorage[dataGood.id]
			containerElem.appendChild(countElem);


			let priceElem = document.createElement('div');	
			priceElem.className = 'basket__item--price';
			priceElem.innerText= dataGood.price;
			containerElem.appendChild(priceElem);

			let delElem = document.createElement('button');	
			delElem.innerText = 'Удалить';
			delElem.onclick = function(){
				console.log('del!')
				localStorage.removeItem(dataGood.id);
				containerElem.remove();
				document.querySelector(".header__basket span").innerText = localStorage.length
			}
			containerElem.appendChild(delElem);



			ROOT_BASKET.appendChild(containerElem);
		}
		)

   })
</script>