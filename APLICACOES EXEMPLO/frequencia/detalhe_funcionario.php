
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache" />
    <title>SISTEMA DE GESTÃO DE EQUIPE - UNIDADE DE AMÔNIA</title>
    <!-- CSS FOLHA DE ESTILOS -->
    <link rel="stylesheet" href="../frequencia/css/folha_de_estilos.css?data=<?php echo date("d/m/Y").' - '.date("h:i:sa"); ?>">
    <!-- CSS ICON AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<?php 
//CONEXÃO ORIENTADA A OBJETOS
//$mysqli = new mysqli("host", "usuario","senha,"bancodedados);
$mysqli = new mysqli("localhost", "u681708158_gestor","gestor_1234A#","u681708158_frequencia");

        // VERIFICANDO CONEXÃO - PARA TESTES
        //  if (!$mysqli) {
            //die("fALHA DE CONEXÃO : " . mysqli_connect_error());
            //}
            //echo "CONEXÃO REALIZADA COM SUCESSO !";
        //mysqli_close($mysqli);

        //EXTRAÇÃO DE PARÂMETRO REPASSADO VIA URL

        $matricula_buscada = $_GET['matricula'];

        // CONSULTA SQL
        $sql = "SELECT * FROM funcionarios WHERE matricula = '$matricula_buscada'";
        $resultado = $mysqli -> query($sql);

        ?>
        <div class="div_titulo_secao">
            <i class="fa-solid fa-user-pen"></i>
            <h2>EFETIVO - UNIDADE DE AMÔNIA</h2>
            <h3>INFORMAÇÕES DO FUNCIONÁRIO</h3>
        </div>
        <div class="div_principal_detalhe"></div>
            <div class="div_interna_detalhe">
            <?php
        
            foreach ($resultado as $linha) {
            $nome = $linha['nome'];
            $matricula = $linha['matricula'];
            $email = $linha['email'];
            $telefone = $linha['telefone'];
            $endereco = $linha['endereco'];
            
            echo "<strong>Nome</strong>";
            echo "<br>";
            echo $nome;
            echo "<br><br>";

            echo "<strong>Matrícula</strong>";
            echo "<br>";
            echo $matricula;
            echo "<br><br>";

            echo "<strong>Email</strong>";
            echo "<br>";
            echo $email;
            echo "<br><br>";

            echo "<strong>Telefone</strong>";
            echo "<br>";
            echo $telefone;
            echo "<br><br>";

            echo "<strong>Endereço</strong>";
            echo "<br>";
            echo $endereco;
            echo "<br><br>";
            }
            // LIMPA A CONSULTA SQL E FECHA CONEXÃO
             $resultado -> free_result();
            $mysqli -> close();
            ?>
            </div>
        <div class="div_principal_detalhe"></div>
        <br>
        <br>
        <div class="logomarca"></div> 
</body>
</html>