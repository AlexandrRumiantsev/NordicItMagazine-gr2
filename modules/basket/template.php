<h1 class="basket-title">ВАША КОРЗИНА</h1>
<h2 class="basket-subtitle">Товары резервируются на ограниченное время</h2>
<div id='root-basket' class='basket container'>
    <div class="row col-titles">
        <div class="col-2">Фото</div>
        <div class="col-6">Наименование</div>
        <div class="col-1">Размер</div>
        <div class="col-1">Количество</div>
        <div class="col-1">Цена</div>
        <div class="col-1">Удалить</div>
    </div>
</div>
<script>
  
     /* Begin consts*/
        const ROOT_BASKET = document.getElementById('root-basket');
        const CONTAINER_ITEM_BASCKET = {
            elem: ''
        }
    /* End consts*/
   
   /* Begin functions */
     const createItem = (data, container, type) => {
        let elemClass = type.split('--')[1];
		container.className = type;
		console.log(data);
		container.innerText =  (elemClass) ? data[elemClass] : ''
		CONTAINER_ITEM_BASCKET.elem.append(container);
     }
     
     const createContainer = (data, container) => {
        container.className = 'basket__item row';
        CONTAINER_ITEM_BASCKET.elem = container;
     }
     
     const createImg = (data, container) => {
         
     }
     const createButton = (data, container) => {
         
     }
     const createItemBasket = (data, type) => {
         console.log(type);
         let btn;
        switch(type){
            case 'basket__item--img':
                btn = 'img';
            break;
            case 'button': 
                btn = type;
            break;
            default:
                btn = 'div';
            break;
        }
        let itemBasket = document.createElement(
            btn
        );	
        console.log(itemBasket);
        let resultElement;
         switch(type){
             case 'container': 
                 resultElement = createContainer(data, itemBasket)
             break;     
             case 'basket__item--img': 
                 resultElement = createImg(data, itemBasket)
             break;
             case 'button':
                 resultElement = createButton(data, itemBasket)
             break; 
             default:
                resultElement = createItem(data, itemBasket, type)
             break; 
         }
         return resultElement;
     }
   /* END functions */

   /*get data basket*/
   const initStartBasket = function(){
       if(sessionStorage.login){
           
            if(localStorage[sessionStorage.login]){
                if(JSON.parse(localStorage[sessionStorage.login])){
                    const dataBasket = JSON.parse(localStorage[sessionStorage.login])
                    Object.keys(dataBasket).forEach(good => {
                        
                       let dataGood = dataBasket[good];

                        let struct = [
                            'container',
                            'basket__item--img',
                            'basket__item--title',
                            'basket__item--sizes',
                            'basket__item--count',
                            'basket__item--price',
                            'button'
                        ]
                        
                        struct.forEach( function(elem){
                            createItemBasket(dataGood, elem);
                        })

			
			
            			let containerElem = document.createElement('div');	
            			containerElem.className = 'basket__item row';
            			
            			
            			
            			let containerImg = document.createElement('img');	
            			containerImg.className = 'basket__item--img col-2';
            			containerImg.src= `${PROTOCOL}//${HOST}/img/catalog/${dataGood.category}/${dataGood.img}.jpg`;
            			containerElem.appendChild(containerImg);
            			
            			let containerName = document.createElement('div');	
            			containerName.className = 'basket__item--name col-6';
            			containerName.innerText= dataGood.title;
            			containerElem.appendChild(containerName);
            			
            			let sizeElem = document.createElement('div');	
            			sizeElem.className = 'basket__item--size col-1';
            			sizeElem.innerText= dataGood.sizes;
            			containerElem.appendChild(sizeElem);
            			
            			let countElem = document.createElement('div');	
            			countElem.className = 'basket__item--count col-1';
            			countElem.innerText= JSON.parse(localStorage[sessionStorage.login])[0].count;
            			containerElem.appendChild(countElem);
            			
            			let priceElem = document.createElement('div');	
            			priceElem.className = 'basket__item--price col-1';
            			priceElem.innerText= dataGood.price;
            			containerElem.appendChild(priceElem);
            			
            			let delElem = document.createElement('button');	
            			delElem.innerText = 'Х';
            			delElem.className = "delete-btn col-1"
            			delElem.onclick = function(e){

            				const array = JSON.parse(localStorage[sessionStorage.login]) ;
            				console.log(array);
            				
            				const arrNewData = [];
            				
            				const found = array.find( (element, index) => {
            				    console.log(element);
            				    console.log(index);
            
            				    
					            if(element.id !== dataGood.id){
					                
					                arrNewData.push(element);
					                
					            }
					            
					        });
					        localStorage.removeItem(sessionStorage.login);
					        localStorage.setItem(
            					        sessionStorage.login, 
            					        JSON.stringify(arrNewData)
        					        );
					        
					        document.querySelector(".header__basket span").innerText = parseInt(document.querySelector(".header__basket span").innerText) - 1;
            				containerElem.remove();
            				
            				
            				
            			}
            			containerElem.appendChild(delElem);
            			
            			
            			ROOT_BASKET.appendChild(containerElem);
                        
                        
                        
                    })
                }
            }
            
       }
       //Object.keys(localStorage[sessionStorge])
       /*
       Object.keys(localStorage).forEach(id => {
   		
   		getDataBasket(
		'GET',
		`${PROTOCOL}//${HOST}/api/controller.php?action=card&&id=${id}`,
		function(data){
			let dataGood = JSON.parse(data);
            
            let struct = [
                'container',
                'basket__item--img',
                'basket__item--title',
                'basket__item--sizes',
                'basket__item--count',
                'basket__item--price',
                'button'
            ]
            struct.forEach( function(elem){
                createItemBasket(dataGood, elem);
            })

			
			/*
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
			*/
			
			//ROOT_BASKET.appendChild(containerElem);
	
   }();
 
</script>