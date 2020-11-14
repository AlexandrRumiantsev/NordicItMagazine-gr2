<?php

switch($_SERVER["REDIRECT_URL"]){
    case NULL:
        include "./modules/main/index.php";
    break;
    case '/css':
    echo 'xxx';
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
        $result = explode("=", $_SERVER["REDIRECT_QUERY_STRING"]);
        if($result[0]){
            echo ' товар'.$result[0];
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