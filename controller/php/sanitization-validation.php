<?php 
    //Variáveis com a entrada dos dados email e password
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    //Array que contém os erros de validação de email e password
    //se algum erro de validação ocorrer, mostrar mensagem de erro para usuário
    $errorsEmail = [];
    $errorsPassword = [];

    //Verifica se o usuário clicou no botão Acessar Conta
    $formSubmitted = isset($_POST['submit']);

    //Validação e Sanitização das variáveis email e password
    //Verifica se os dados foram recebidos por método post
    if($formSubmitted) {
        //Validação email
        //Filtra o email para um email válido
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        //Verifica se email está vazio
        if(empty($email)) {
            $errorsEmail[] = "O campo de email é obrigatório."; 
        //Verifica se é um email válido    
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorsEmail[] = "O email informado é inválido.";
        }
        //Validação de password
        //Verifica se password está vazio e se atende todos os requisitos de validação para senhas
        if(empty($password)) {
            $errorsPassword[] = "O campo de senha é obrigatório.";
        } else if(strlen($password) < 8) {
            $errorsPassword[] = "A senha deve ter no mínimo 8 caracteres.";
        } else if(!preg_match('/[A-Z]/', $password)) {
            $errorsPassword[] = "A senha deve conter no mínimo uma letra maiúscula.";
        } else if(!preg_match('/[a-z]/', $password)) {
            $errorsPassword[] = "A senha deve conter no mínimo uma letra minúscula.";
        } else if(!preg_match('/[0-9]/', $password)) {
            $errorsPassword[] = "A senha deve conter no mínimo um número.";
        } else if(!preg_match('/[\W_]/', $password)) {
            $errorsPassword[] = "A senha deve conter no mínimo um caractere especial.";
        }
    }
?>