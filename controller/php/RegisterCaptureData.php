<?php

function captureRegisterData() : bool {
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cPassword = $_POST['confirm_password'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        return true;
    } else {
        return false;
    }
}

?>