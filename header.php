<?php
error_reporting(E_ERROR);
session_start();


?>
<header>
    <div>Логотип</div>
    <nav>
        <ul>
            <li><a href='#'>Женщинам</a></li>
            <li><a href='#'>Мужчинам</a></li>
            <li><a href='#'>Детям</a></li>
            <li><a href='#'>Новинки</a></li>
            <li><a href='#'>О Нас</a></li>
        </ul>
    <nav>
    <div class='header__button'>
        <a href="#">Войти</a>
        <a href="#">Корзина (0)</a>
    </div>
</header>

<div class='popupp-container'>
    <form id='aut' class='active'>
        <h2>Авторизация</h2>
        <input name='login'></input>
        <input name='pass'></input>
        <input type='submit'></input>
        <input type='hidden' name='action' value='aut'></input>
    </form>
    <form id='reg'>
        <h2>Регистрация</h2>
        <input name='login'></input>
        <input name='pass'></input>
        <input name='name'></input>
        <input name='email'></input>
        <input type='hidden' name='action' value='reg'></input>
        <input type='submit'></input>
    </form>
    <div>
        <button data-to='aut'>
            Авторизация
        </button>
        <button data-to='reg'>
            Регистрация
        </button>
    </div>    
</div>

<div class='overlay'>
    <img src="/img/loader.gif">
</div>

<script src='/script.js'></script>

