<?php

#CHAVE LADO CLIENTE
define('CHAVE_SITE', '6LdeitcqAAAAAFe1evLK_LntA7rS_1Ar_tJpvS9_');
#CHAVER LADO SERVIDOR
define('CHAVE_SECRETA', '6LdeitcqAAAAADkH4NanJZylbwm6DZAmD3Sd4MMg');

#VALIDAÇÃO DO RECAPTCHA
if($_POST){
    function validarRecaptcha($token)
    {
        $saida = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . CHAVE_SECRETA . '&response=' . $token);
        $resposta = json_decode($saida);
        return $resposta;
    }
     $resposta = validarRecaptcha($_POST['g-recaptcha-response']);
     # COMPONENTES DE SAÍDA DE PROCESSAMENTO DO TOKEN
     $validacao = $resposta->success;
     $data_hora_validacao = $resposta->challenge_ts;
     $host_validacao = $resposta->hostname;
     $erro_validacao = $resposta->error-codes;
     $mensagem_escore = $resposta->score;

}
?>