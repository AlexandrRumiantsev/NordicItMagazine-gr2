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
            
        break;
        case 'mail':
            $message = "
                Поздравляю, вы подписались на рассылку наших предложений,
                наш менеджер, скоро с вами свяжется
            ";
            $subject = "Подписка на сайт SH";
            $resultMail = mail($_REQUEST['mail'], $subject, $message);
            echo $resultMail;
        break;
        case 'send_order':
            $order = json_decode($_REQUEST['order']);
            
            $messege .= '<h1>Ваш заказ:</h1>';
            $messege .= '<table>';
            foreach($order as $itemOrder){
                $messege .= '<tr><td>Название<td><td>'. $itemOrder->title.'</td></tr>';
                $messege .= '<tr><td>Описание<td><td>'. $itemOrder->discr.'</td></tr>';
                $messege .= '<tr><td>Цена<td><td>'. $itemOrder->price.'</td></tr>';
                $messege .= '<tr><td>Картинка<td><td> <img src="'.$_SERVER['SERVER_NAME'].'/img/catalog/'.$itemOrder->category.'/'.$itemOrder->img.'.jpg"/></td></tr>';
                $messege .= '<tr><td>Категория<td><td>'. $itemOrder->category.'</td></tr>';
                $messege .= '<tr><td>Размеры<td><td>'. $itemOrder->sizes.'</td></tr>';
                $messege .= '<tr><td>Кол-во.<td><td>'. $itemOrder->count.'</td></tr>';
            }
            $messege .= '</table>';
            var_dump($messege); 
            $subject = "Ваш заказ на сайте SH";
            $headers = "MIME-Version: 1.0" . "\r\n";
            
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            $resultMail = mail($_REQUEST['mail'], $subject, $messege, $headers);
            echo $resultMail;
        break;
    }
    

