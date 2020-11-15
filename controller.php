<?php
switch($_SERVER["REDIRECT_URL"]){
    case NULL:
        include "./modules/main/template.php";
    break;  
    case '/catalog':
        echo "Каталог магазина";
        include "./modules/catalog/template.php";
    break;
    case '/basket':
        echo "Корзина магазина";
    break;
    case '/card':
        echo "Товар магазина";
        $idGood = $_SERVER["REDIRECT_QUERY_STRING"];
        if($idGood){
            //echo ' товар'.$idGood;
            include "./modules/card/template.php";
        }else echo 'Идентификатор товара не указан';
    break;
    case '/chat':
        echo __DIR__;
        echo 'Чат проекта';
    break;
    default:
       include "./modules/errors/404.php";
    break;
}