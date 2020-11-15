<div 
	data-id="<?=$idGood?>" 
	id='root-detail' class='detail'>

</div>

<script type="text/javascript">

	let globalData = {};

	const rootDetail = document.getElementById('root-detail');

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


 	function creatCard(data){
 		
 		let containerCard = document.createElement('div')
 		containerCard.className = 'detail__container container';
 		let dataIndex = [
 			'title',
 			'category',
 			'discr',
 			'img',
 			'id',
 			'price',
 			'sizes'
 		];
 		dataIndex.forEach(function(index){
 			if(index == 'sizes'){
			const sizeData = JSON.parse(data[index])


			let sortable = [];
			for (let vehicle in sizeData) {
			    sortable.push([vehicle, sizeData[vehicle]]);
			}

			sortable.sort(function(a, b) {
			    return a[1] - b[1];
			});
		
			
			let rootSizes = document.createElement('div');
			rootSizes.className = 'root-sizes';

			console.log(globalData);
			//globalData.containerBtn.appendChild(
			//	rootSizes
			//);
			//rootDetail.appendChild(rootSizes);

 			for (const property in sortable) {
			 console.log(sortable[property][1]);
			 let size = document.createElement('div');
			 size.className = 'size-element';
			 size.innerText = sortable[property][1];

			 //rootSizes.appendChild(size);
			 rootSizes.insertAdjacentHTML('beforeend', size.innerHTML);
			}


 			}else{
 				let div = document.createElement('div');
	 			div.className = `container-${data[index]}` 
	 			div.innerText = data[index];
				containerCard.appendChild(div)
 			}
 			
 		})
 		rootDetail.appendChild(containerCard);
 	}
	sendData(
		'GET',
		`${PROTOCOL}//${HOST}/api/controller.php?action=card&&id=${rootDetail.dataset.id}`,
		function(data){

			if(JSON.parse(data)){

				creatCard(JSON.parse(data))

				if(
					sessionStorage.getItem('login')
				){
					let containerBtn = document.createElement('div');
					globalData['containerBtn'] = containerBtn;

					containerBtn.className = 'container-btn';
					let addBasket = document.createElement('button');
					addBasket.innerText = 'Добавить в корзину';
					addBasket.onclick = () => {
						console.log('ADD BASKET');
					}
					containerBtn.appendChild(addBasket);
					rootDetail.appendChild(containerBtn);

				}

			}else{
				alert('Not Found')
			};
		}
	)

	
    
</script>
