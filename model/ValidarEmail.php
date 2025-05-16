<?php

class ValidarEmail {

    public function validar(string $email) : bool {
        if(empty($email)) {
            return false;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if(strlen($email) > 254) {
            return false;
        }

        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if(!preg_match($pattern, $email)) {
            return false;
        }

        return true;
    }

    public function sanitizar(string $email) : string {
        $email = trim($email);
        $email = strtolower($email);
        
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}
?>