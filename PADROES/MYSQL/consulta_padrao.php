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


         // REALIZA CONSULTA SQL
         $sql = "SELECT * FROM nomedatabela";
         $resultado = $mysqli -> query($sql);

        // ESVAZIA A CONSULTA SQL
        $resultado -> free_result();

// FECHANDO A CONEXÃO
mysqli_close($mysqli);

?>






