<?php 

// CONEXÃO ORIENTADA A OBJETOS
// PADRÃO DE CONEXÃO AO BANCO MYSQL

//$mysqli = new mysqli("host", "usuario","senha,"bancodedados);
$mysqli = new mysqli("localhost", "usuario","senha","nomedobancodedados");

        // VERIFICANDO A CONEXÃO
        if (!$mysqli) {
            die("FALHA DE CONEXÃO : " . mysqli_connect_error());
            }
            "CONEXÃO REALIZADA COM SUCESSO !";

// FECHANDO A CONEXÃO
mysqli_close($mysqli);

?>