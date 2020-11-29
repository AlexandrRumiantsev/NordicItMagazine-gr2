<?php
     
   ini_set('display_errors',1);
error_reporting(E_ALL);

    switch ($_REQUEST['action']){
        case 'catalog':
            header("Access-Control-Allow-Origin: *");
            include_once('./goods.php');
            $goods = new goods;

            
            $arResult = $goods -> getList(
                            $_REQUEST['category']
                        );
            echo '[';
                $counter = mysqli_num_rows($arResult);
                $i = 1;
                while ($row = $arResult->fetch_assoc()) {
                        echo json_encode($row); 
                        if($i < $counter){
                          echo ',';
                        }; 
                        $i++;
                }
            echo ']';
            

        break;
        case 'card':
           include_once('./goods.php');
           $goods = new goods;
           $result = $goods -> getItem($_REQUEST['id']);
           $data = $result -> fetch_assoc();
           echo json_encode($data);
        break;
        case 'basket':
           include_once('./basket.php');
        break;
        case 'reg':
            include_once('./user.php');
            $user = new User;
            $user -> save(false);
        case 'aut':
            include_once('./user.php'); 
            $user = new User;  
            $user -> login(false); 
        break;    
        case 'add_good':
            include_once('./goods.php');
            $goods = new Goods; 
            $goods -> save($_REQUEST);
            
        

        /*
        if ( $_FILES['file']['error'] > 0 ){
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                } else {
                     $uploadfile = "/var/www/www-root/data/www/magazine.webvolt.ru/upload/".$_FILES['file']['name'];
          move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
        }
        */
        

        break;
    }
    

