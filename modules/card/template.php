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
 		let containerCard = document.createElement('div');
 		
 		containerCard.className = 'detail__container container';
 		
 		let dataIndex = [
 			'title',
 			'category',
 			'discr',
 			'img',
 			'id',
 			'price',
 			'sizes',
 			'count'
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
 			}else if(index == 'count'){
 			    let containerCount = document.createElement('div');
 			    containerCount.classList = 'container-count';
 			    
 			    let resultCount = document.createElement('div');
 			    resultCount.innerText = 1;
 			    
 			    let minuseCount = document.createElement('button');
 			    minuseCount.innerText = '-';
 			    minuseCount.onclick = function(){
     			    if(parseInt(resultCount.innerText) != 1){
     			        resultCount.innerText = parseInt(resultCount.innerText) - 1;
     			        globalData.countBasket = parseInt(resultCount.innerText);
     			    }
     			      
     			      
 			    }
 			    
 			    let pluseCount = document.createElement('button');
 			    pluseCount.innerText = '+';
 			    pluseCount.onclick = function(){
 			      resultCount.innerText = parseInt(resultCount.innerText) + 1;
 			      globalData.countBasket = parseInt(resultCount.innerText);
 			    }
 			    
 			    
 			    
 			    containerCount.appendChild(minuseCount);
 			    containerCount.appendChild(resultCount);
 			    containerCount.appendChild(pluseCount);
 			    containerCard.appendChild(containerCount);
 			    
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
    			    const finalData = JSON.parse(data);
    				creatCard(finalData);
				if(
					sessionStorage.getItem('login')
				){
					let containerBtn = document.createElement('div');
					globalData['containerBtn'] = containerBtn;
					containerBtn.className = 'container-btn';
					let addBasket = document.createElement('button');
					addBasket.innerText = 'Добавить в корзину';
					addBasket.onclick = () => {
					    finalData.count = globalData.countBasket;
					    sessionStorage.login
					  
					    let ad = localStorage.getItem(
					        sessionStorage.login
					    )
					    
					    
					    if(!ad){
					        const arResult = [];
					        arResult.push(finalData);
					        localStorage.setItem(
    					        sessionStorage.login, 
    					        JSON.stringify(arResult)
					        );
					    }else{
					        const array = JSON.parse(ad) ;
					        const found = array.find( (element, index) => {
					            if(element.id === finalData.id){

					                array[index] = finalData;
					                localStorage.removeItem(sessionStorage.login);
					                
        					        localStorage.setItem(
            					        sessionStorage.login, 
            					        JSON.stringify(array)
        					        );
        					        return true;
					            }
					        });
					        
					        if(!found){
					            const result = localStorage.getItem(
        					        sessionStorage.login
        					    );
        					    const arrGood = JSON.parse(result);
        					    arrGood.push(finalData);
        					    let newFinalData = JSON.stringify(arrGood);
        					    
        					    localStorage.removeItem(
        					        sessionStorage.login
        					    );
        					    
        					     localStorage.setItem(
        					        sessionStorage.login,
        					        newFinalData
        					    );
        					    
					        }

					    }
					    
					    document.querySelector(".header__basket span").innerText = JSON.parse(localStorage.admin).length
                        
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
