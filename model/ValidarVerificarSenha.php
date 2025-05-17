<?php

class ValidarVerificarSenha {

    private int $tamanhoMinimo = 8;
    private int $tamanhoMaximo = 72;

    public function validar(string $senha, string $confirmarSenha) : array {
        if($senha != $confirmarSenha) {
            $erros[] = 'Senhas diferentes';
        }

        if(strlen($senha) < $this->tamanhoMinimo) {
            $erros[] = "A senha deve ter no minimo 8 caracteres";
        }

        if(strlen($senha) > $this->tamanhoMaximo) {
            $erros[] = "A senha deve ter no máximo 72 caracteres";
        }

        if(!preg_match('/[A-Z]/', $senha)) {
            $erros[] = "A senha deve conter pelo menos uma letra maiúscula";
        }

        if(!preg_match('/[a-z]/', $senha)) {
            $erros[] = "A senha deve conter pelo menos uma letra minúscula";
        }

        if(!preg_match('/[0-9]/', $senha)) {
            $erros[] = "A senha deve conter pelo menos um número";
        }

        if(!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $senha)) {
            $erros[] = "A senha deve conter pelo menos um caractere especial";
        }
        return $erros;
    }

    public function gerarHash(string $senha) : string {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function verificarSenha(string $senha, string $hash) : bool {
        return password_verify($senha, $hash);
    }
 }
?>