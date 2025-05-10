<?php

class CapturarDadosCadastro {

    private string $name;
    private string $email;
    private string $password;
    private string $cPassword;
    private string $date;
    private string $gender;
    private string $tipo_usuario;
    private bool $senhasDiferentes = false;

    public function capturarDadosDeCadastro(string $tipo_usuario) : bool {
        if(isset($_POST['submit'])) {
            if(empty($_POST['name']) || empty($_POST['email']) || 
            empty($_POST['password']) || empty($_POST['confirm_password']) || 
            empty($_POST['date']) || empty($_POST['gender'])) {
            return false;
        }
            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->cPassword = $_POST['confirm_password'];
            $this->date = $_POST['date'];
            $this->gender = $_POST['gender'];
            $this->tipo_usuario = $tipo_usuario;
        } else {
            return false;
        }
        if($this->password != $this->cPassword ) {
            $this->senhasDiferentes = true;
            $this->name = '';
            $this->email = '';
            $this->password = '';
            $this->cPassword = '';
            $this->date = '';
            $this->gender = '';
            return false;
        } else {
            return true;
        }
    }

    public function criarArrayDadosDeCadastro() : array {
        if($this->senhasDiferentes === false) {
            $dados = [
                'nome' => "$this->name",
                'sexo' => "$this->gender",
                'data_de_nascimento' => "$this->date",
                'email' => "$this->email",
                'senha' => "$this->password",
                'tipo_usuario' => "$this->tipo_usuario"
            ];
            return $dados;
        } else {
            return ['error' => 'Senhas diferentes'];
        }
    }
}

?>