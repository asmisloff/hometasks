<?php

include "base.php";
include_once './global_declarations.php';

class Controller_Index extends Controller_Base {

    public function index() {       
        a("auth/showLogInForm", "Авторизация");
        a("auth/logout", "Выход");
        a("UserSelector/ShowUsersList", "Список пользователей");
        a("UserSelector/ShowUserPhotos", "Просмотреть свои картинки");
        a("Reg/showRegForm", "Зарегистрироваться");
    }

}
