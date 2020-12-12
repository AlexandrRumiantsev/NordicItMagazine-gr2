<form 
	id='add_good' 
	enctype="multipart/form-data"
	onsubmit="submitForm(this);return false;"
>
	<p><input name='title' type='text'/></p>
	<p><textarea name='discr'>	
	</textarea></p>
	<p><input name='price' type='number'/></p>
	<p>
	    <select name="category">
            <option value="">--Выберете категорию товара--</option>
            <option value="men">Мужчинам</option>
            <option value="woman">Женщинам</option>
            <option value="children">Детям</option>
            <option value="new">Новинки</option>
        </select>
    </p>
    
    <p>34<input name='size[]' type="checkbox" value='34'> </p>
    <p> 45<input name='size[]' type="checkbox" value='45'></p>
     <p>54<input name='size[]' type="checkbox" value='54'></p>
     <p>34<input name='size[]' type="checkbox" value='34'></p>
     <p>43<input name='size[]' type="checkbox" value='43'></p>

	<input name='file' type='file'/>
	<p>
	    <input type='submit' name='test'/>
	</p>	    
</form>

<script type="text/javascript">
function sendData(type, url, callback, form) {
		const formData = new FormData(form);

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
		const file = document.querySelector("input[type=file]").files[0];
	    formData.append('fileAjax', file);
	    XHR.send(formData);

	}
 function submitForm(){
 	sendData(
		'POST',
		`${PROTOCOL}//${HOST}/api/controller.php?action=add_good`,
		function(data){
			console.log(data);
		},
		document.forms.add_good
	)
 }
 
 const initStartAdmin = function(){
     
     !sessionStorage.login ? document.forms.add_good.remove() : ``; 
     
 }();
</script>