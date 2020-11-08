<?php
include_once 'db.php';
/**
* User , Модель юзера в базе данных
* 
* Развернутое описание
* 
* @имя_тега значение
* @return тип_данных
*/

class User extends db{
    //Атрибуты
    private $login ;
    private $password ;
    private $mail ;
    //Методы
    function setLogin(){
        $this -> login = strip_tags($_REQUEST['login']);
    }
    function getLogin(){
        return $this -> login;
    }
    function setPassword(){
        $this -> password = strip_tags($_REQUEST['password']);
    }
    function getPassword(){
        return $this -> password;
    }
    function setMail(){
        $this -> mail = strip_tags($_REQUEST['mail']);
    }
    function getMail(){
        return $this -> mail;
    }
    function accept($mail){
        $connect = parent::extendConnect('localhost');
        
        $result =  $connect->query("SELECT * FROM users WHERE mail='$mail'");
        
        if($connect->affected_rows != 0){
             $sql = "
            UPDATE users
            SET accept = 1
            WHERE mail = '".$mail ."'";
        
            $result = mysqli_query($connect, $sql); 
            echo 'Учетная запись подтверждена';
        }else{
            echo 'Учетная запись не найдена в системе';
        }
        
    }
    function login(){
        $log = $_REQUEST['pass'];
        $pass = $_REQUEST['login'];

        $connect = parent::extendConnect('localhost');

        $sql = "SELECT * FROM `user` WHERE LOGIN = '$log' AND PASSWORD = '{$pass}'";

        $result = mysqli_query($connect, $sql); 

        if($result){
            //echo 'Запрос успешен!';
            if($result -> num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                
               //$res = json_encode($row);
               //setcookie('user', $res);
              }  
            }else 'USER NOT FOUND';
            
            
        }else echo $sql; 
    }
    function save(){
        $linkFromParent = parent::extendConnect('localhost');
        $login = $_REQUEST["login"];
        $pass = $_REQUEST["pass"];
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];

        $sql = "INSERT INTO `user`  (
            `NAME`, `LOGIN`, `EMAIL` , `PASSWORD`
        ) 
        VALUES ( 
            '$name', '$login', '$email' , '$pass' 
        )";

        $result = mysqli_query($linkFromParent, $sql); 
        if($result){
            echo 'Запрос успешно сработал';
        } else echo $sql;   

        /*
        
        $result = mysqli_query($connect, $sql); 
        if($result){
             echo 'Запрос успешно сработал';
        } else echo $sql;    
        */       
    }
    function session_start(){
        /*
      Для сохранения авторизации на всех страницах
      используем механизм сессии.
      При каждом заходе на главную страницу, проверяется 
      сохраненная в куке переменная и происходит старт сессии.
      Для работы сессии на локальном сервере, необходимо поменять
      значения в php.ini:
         session.auto_start = 1
         session.cookie_lifetime = 1
      */
   
        $dataUserCookie = json_decode($_COOKIE["user"] , true);
        
        if( $dataUserCookie["login"] != '' ){
            session_start();
            $_COOKIE["login"] = $dataUserCookie["login"];
            $_SESSION['isAuth'] = true;
            $_SESSION['user_data'] =  $dataUserCookie;
            $_SESSION['login'] = $dataUserCookie["login"];
       }else $_SESSION['login'] = '';
    }
    /*
    function __construct($action = '') {
        $this -> setLogin();
        $this -> setPassword();

        if($action == 'autorize'){
            $linkFromParent = parent::extendConnect('localhost');
            $this -> login($linkFromParent);
        }
        else if($action == 'reg'){
            $this -> setMail();
            $linkFromParent = parent::extendConnect('localhost');
            
            $this -> save($linkFromParent);
            
        }
    }
    */
}


?>