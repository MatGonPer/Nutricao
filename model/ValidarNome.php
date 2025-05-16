<?php

class ValidarNome {

    public function validar(string $nome) : bool {
        $nome = trim($nome);

        if(empty($nome)) {
            return false;
        }

        if(strlen($nome) < 5 || strlen($nome) > 100) {
            return false;
        }

        $pattern = "/^[a-záàâãéèêíïóôõöúçñ' ]+$/i";
        if(!preg_match($pattern, $nome)) {
            return false;
        }

        if(strpos($nome, ' ') === false) {
            return false;
        }

        return true;
    }

    public function sanitizar(string $nome) : string {
        //Remover espaços extras e converte string para minúsculo
        $nome = mb_strtolower(trim($nome));
        //Deixa a primeira letra maiuscula de cada palavra
        $nome = mb_convert_case($nome, MB_CASE_TITLE);
        //Remove multiplos espaços entre as palavras da string
        $nome = preg_replace('/\s+/', ' ', $nome);

        return $nome;
    }
}
?>