<?php

include_once "./global_declarations.php";
include_once "base.php";
include_once "./models/ht4Model.php";

class Controller_UserSelector extends Controller_Base {

    private $db;

    public function __construct() {
        $this->db = new HT4Model();
    }

    public function index() {
        echo "QueryDB_Contoller";
    }

    public function selectUser($login) {
        $user = $this->db->getUserInfo($login);
        return $user;
    }

    public function showUserPhotos() {
        session_start();
        if (isset($_SESSION["user"])) {
            $login = $_SESSION["user"];
            $user = $this->selectUser($login);
            $PHOTOS = $user->Photos;
            include "./views/ShowPhotosView.php";
        }
        else {
            echo "Вы не авториованы <br>";
            toTheMainPage();
        }
    }

    public function showUsersList() {
        session_start();
        if (isset($_SESSION["user"])) {
            $lst = $this->db->getUsersList();
            foreach ($lst as $user) {
                if ($user->Age >= 18) {
                    $user->Meta = "Совершеннолетний";
                }
                else {
                    $user->Meta = "Несовершеннолетний";
                }
            }
            include './views/ShowListOfUsersView.php';
            showListOfUsers($lst);
        }
        else {
            echo "Вы не авторизованы";
        }
    }

}
