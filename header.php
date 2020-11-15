<?php
error_reporting(E_ERROR);
session_start();
?>
<header>
    <nav>
        <div class="logo"></div>
        <ul>
            <li>
                <a href='/catalog?category=woman'>
                    Женщинам
                </a>
            </li>
            <li>
                <a href='/catalog?category=men'>
                    Мужчинам
                </a>
            </li>
            <li>
                <a href='/catalog?category=children'>
                    Детям
                </a>
            </li>
            <li>
                <a href='/catalog?category=new'>
                    Новинки
                </a>
            </li>
            <li>
                <a href='#'>
                    О Нас
                </a>
            </li>
        </ul>
        <div class='header__button'>
            <div class="header__enter">
                <img src="../img/icons/account.png">
                <a href="#">Войти</a>
            </div>
            <div class="header__basket">
            <img src="../img/icons/bascet.png">
                <a href="#">Корзина (0)</a>
            </div>
            
        </div>
    </nav>
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

<script src='script.js'></script>

