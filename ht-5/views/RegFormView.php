<?php

class RegFormView {

    static function show($loginVarName, $pwdVarName, $ageVarName, $aboutVarName, $photoVarName, $action) {
        echo "<form method='post' enctype='multipart/form-data' action='" .
        "$action/$loginVarName/$pwdVarName/$ageVarName/$aboutVarName/$photoVarName'>";
        echo "Login: <input type='text' name='$loginVarName'> <br>";
        echo "Password: <input type='text' name='$pwdVarName'> <br>";
        echo "Age: <input type='text' name='$ageVarName'> <br>";
        echo "About: <textarea name='$aboutVarName'> </textarea> <br>";
        echo "Photo: <input type='file' name='$photoVarName' accept='image/*'> <br>";
        
        echo "<input type='submit' value='Зарегистрироваться'> <br>";
        echo "</form>";
    }

}

//test
//RegFormView::show("login", "pwd", "age", "about", "photo", "action");