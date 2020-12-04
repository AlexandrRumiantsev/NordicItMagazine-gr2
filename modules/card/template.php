<div 
	data-id="<?=$idGood?>" 
	id='root-detail' class='detail'>
</div>

<script type="text/javascript">
    /* Begin const */
    let globalData = {
		countBasket: 0 
	};
	const rootDetail = document.getElementById('root-detail');
    /* END const */
	

	/* Begin function */
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

 			for (const property in sortable) {
			
			 let size = document.createElement('div');
			 size.className = 'size-element';
			 size.innerText = sortable[property][1];

			 size.onclick = function(event){
			 	//3 варианта как взять ТЕКУЩИЙ элемент 
			 	console.log(this)
			 	console.log(size)
			 	console.log(event.target);
			 	size.classList.toggle('active');
			 }
			 rootSizes.appendChild(size);
			}
			containerCard.appendChild(rootSizes)
 			}else{
 				let div = document.createElement('div');
	 			div.className = `container-${index}` 
	 			div.innerText = data[index];
				containerCard.appendChild(div)
 			}
 		})
 		rootDetail.appendChild(containerCard);
 	}
	/* END function */

/* 
    - getDataCard - get data item good
*/
const initStartCard = function() {
    getDataCard(
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
						let prevState = localStorage.getItem(JSON.parse(data)['id'])
						globalData.countBasket = prevState ? prevState : '';
						globalData.countBasket++;
						localStorage.setItem(JSON.parse(data)['id'], globalData.countBasket);
						document.querySelector(".header__basket span").innerText = localStorage.length
						
					}
					containerBtn.appendChild(addBasket);
					rootDetail.appendChild(containerBtn);
				}
			}else{
				alert('Not Found')
			};
		}
	);
}();
</script>
