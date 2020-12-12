<form 
	id='add_good' 
	enctype="multipart/form-data"
>
	<input name='test'/>
	<input name='file' type='file'/>
	<input type='submit' name='test'/>
</form>
<?php


                //var_dump($_FILES['file']['tmp_name']);
                //var_dump(file_exists($upload_dir));

                
                $res = move_uploaded_file(
	                $_FILES['file']['tmp_name'], 
	                $_SERVER['DOCUMENT_ROOT'].'/upload/' 
                ); // Перемещаем файл в желаемую директорию
                var_dump($res); // Оповещаем пользователя об успешной загрузке файла