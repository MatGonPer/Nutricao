<?php

class ValidarDataDeNascimento {

    //Verifica se a idade é válida, caso a idade seja menor que 18 anos ou caso seja maior que 100 anos retorna false
    public function validar(string $data) : bool {
        $anoAtual = new DateTime();
        $anoAtual = $anoAtual->format('Y');

        $dataUsuario = new DateTime($data);
        $dataUsuario = $dataUsuario->format('Y');

        if($anoAtual - $dataUsuario < 13) {
            return false;
        } else if ($anoAtual - $dataUsuario > 100) {
            return false;
        }
        return true;
    }
    
}
?>