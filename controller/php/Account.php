<?php

class Account {

    private string $name;
    private string $email;
    private string $password;
    private string $cPassword;
    private string $date;
    private string $gender;

    public function __construct(string $name, string $email, string $password, string $cPassword, string $date, string $gender) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->cPassword = $cPassword;
        $this->date = $date;
        $this->gender = $gender;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->name = $email;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function setPassword(string $password) {
        $this->name = $password;
    }

    public function getcPassword() : string {
        return $this->cPassword;
    }

    public function setcPassword(string $cPassword) {
        $this->name = $cPassword;
    }

    public function getDate() : string {
        return $this->date;
    }

    public function setDate(string $date) {
        $this->name = $date;
    }

    public function getGender() : string {
        return $this->gender;
    }

    public function setGender(string $gender) {
        $this->name = $gender;
    }

}
?>