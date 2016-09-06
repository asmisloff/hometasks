<?php

include "./controllers/base.php";
include "./models/ht4Model.php";

class Controller_Reg extends Controller_Base {

    public function index() {
        return null;
    }

    public static function showRegForm() {
        include "./views/RegFormView.php";
        RegFormView::show("login", "pwd", "age", "about", "photo", ROOT . "/reg/registerUser");
    }

    public function registerUser($loginVarName, $pwdVarName, $ageVarName, $aboutVarName, $photoVarName) {
        $login = filter_input(INPUT_POST, $loginVarName, FILTER_SANITIZE_STRING);
        $pwd = filter_input(INPUT_POST, $pwdVarName, FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, $ageVarName, FILTER_VALIDATE_INT);
        $about = filter_input(INPUT_POST, $aboutVarName, FILTER_SANITIZE_STRING);
        $photo = $_FILES[$photoVarName];
        
        if (!$this->is_image($photo)) {
            echo "$photo is not an image <br>";
            onTheMainPage();
            return;
        }

        $m = new HT4Model();
        $user = $m->getUserInfo($login);
        if (!$user) {
            $res = $m->addUser($login, $pwd, $age, $about, $photo);
            if ($res) {
                echo "Добавлен пользователь $login <br>";
                onTheMainPage();
            }
        }
        else {
            echo "Пользователь $login уже существует <br>";
            onTheMainPage();
        }
    }

    private function is_image($file) {
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            return true;
        }
        else {
            return false;
        }
    }

}
