<?php

class LogInFormView {

    static function show($loginVarName, $pwdVarName, $action) {
        echo "<form method='post' action='" . 
                "$action/$loginVarName/$pwdVarName'>";
        echo "Login: <input type='text' name='$loginVarName'>";
        echo "Password: <input type='text' name='$pwdVarName'>";
        echo "<input type='submit' value='Войти'>";
    }

}

//test
//LogInFormView::show("login", "pwd");