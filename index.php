<html>
<head>
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="/style/style.css">
    <!-- Подключаем Bootstrap CSS -->
     <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous"
     > 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     
     <meta name="title" content="SH - top shops magazone">
     <meta name="description" content="Вещи для всех по топовым ценам!">
     
     <meta property="og:type" content="website">
     <meta property="og:url" content="http://magazine.webvolt.ru/">
     <meta property="og:site_name" content="SH">
    <?
        if($_SERVER["REDIRECT_URL"] == '/card'){

        }else{
            ?> 
                <meta property="og:image" content="https://previews.123rf.com/images/mohammadmuhtadi/mohammadmuhtadi1810/mohammadmuhtadi181003607/110259984-initial-letter-sh-logo-template-design.jpg">
                <meta property="og:title" content="SH - top shops magazone">
            <?
        }
    ?>
         
     
     
     <meta property="og:description" content="Вещи для всех по топовым ценам!">
     
     <script src='global.js'></script> 
    <script src='/libJS/send-data.js'></script>
</head>
<body>
<div class="main-background">     
    <div class="container">    
        <?php
            header("Access-Control-Allow-Origin: *");
            include_once "./libPHP/index.php";
            include_once "header.php";
            include_once "controller.php";
            include_once "footer.php";
        ?>
    </div>
</div>
<script src='script.js'></script> 
</body>
</html>