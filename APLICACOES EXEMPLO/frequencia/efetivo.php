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


    if (isset($_POST['matricula']) && isset($_POST['verificador'])) {

    $matricula = $_POST['matricula'];
    $verificador = $_POST['verificador'];

    }
    else{

    $matricula = "";
    $verificador = "";

    }

 if ($verificador == 1){

//CONEXÃO ORIENTADA A OBJETOS
//$mysqli = new mysqli("host", "usuario","senha,"bancodedados);
$mysqli = new mysqli("localhost", "u681708158_gestor","gestor_1234A#","u681708158_frequencia");

        // VERIFICANDO CONEXÃO - PARA TESTES
        //  if (!$mysqli) {
            //die("fALHA DE CONEXÃO : " . mysqli_connect_error());
            //}
            //echo "CONEXÃO REALIZADA COM SUCESSO !";
        //mysqli_close($mysqli);


        // CONSULTA SQL
        $sql = "SELECT * FROM funcionarios ORDER BY grupo";
        $resultado = $mysqli -> query($sql);

        // CONTABILIZA QUANTOS FAZEM PARTE DO EFETIVO
        $quantitativo = mysqli_num_rows($resultado);

        ?>
        <div class="div_titulo_secao">
            <i class="fa-solid fa-users"></i>
            <h2>EFETIVO - UNIDADE DE AMÔNIA</h2>
            <h3>TOTAL DE <?php echo $quantitativo; ?> PESSOAS</h3>
            <h4>LEGENDA : <i class="fa-solid fa-star"> - SUPERVISOR</i> | <i class="fa-solid fa-star-half-stroke"> - SUBSTITUTO</i> | <i class="fa-solid fa-fire-extinguisher"> - BRIGADISTA</i> </h4>
        </div>
        <div class="div_principal">
            <div class="div_titulo_matricula">MAT.</div>
            <div class="div_titulo_nome">NOME</div>
            <div class="div_titulo_grupo">GRUPO</div>
            <div class="div_titulo_funcao">FUNÇÃO</div>
        </div>
            <?php
        
            foreach ($resultado as $linha) {
            $matricula = $linha['matricula'];
            $nome = $linha['nome'];
            $grupo = $linha['grupo'];
            $funcao = $linha['funcao'];
            $substituto = $linha['substituto'];
            $brigadista = $linha['brigadista'];

            echo "<div class=\"div_interna\">";

            echo "<div class=\"div_conteudo_matricula\">". $matricula . "</div>";
            echo "<div class=\"div_conteudo_nome\">";
            ?>
            <a href="detalhe_funcionario.php?matricula=<?php echo $matricula; ?>" target="_blank"><?php echo $nome; ?></a>
            <?php
            
                    if ($funcao == "SUPERVISOR" OR $funcao == "ESPEC. TÉC.") {
                        echo "    - <i class=\"fa-solid fa-star\"></i>";
                    }

                    if ($substituto == 1) {
                        echo "    - <i class=\"fa-solid fa-star-half-stroke\"></i>";
                    }

                    if ($brigadista == 1) {
                        echo "    - <i class=\"fa-solid fa-fire-extinguisher\"></i>";
                    }

            echo  "</div>";
            echo "<div class=\"div_conteudo_grupo\">" . $grupo  ."</div>";
            echo "<div class=\"div_conteudo_funcao\">" . $funcao  ."</div>";

            echo "</div>";
            
            }
            
        // LIMPA A CONSULTA SQL E FECHA CONEXÃO
        $resultado -> free_result();
        $mysqli -> close();
?>

        <div class="div_rodape">
            <div class="div_titulo_matricula"></div>
            <div class="div_titulo_nome"></div>
            <div class="div_titulo_grupo"></div>
            <div class="div_titulo_funcao"></div>
        </div>
<?php
}
else{
                // ACESSO NÃO AUTORIZADO

                echo "<div class=\"div_geral_menu_botoes\">";
                echo "<br><br><br><br><br>";
                echo "<strong>ACESSO NÃO AUTORIZADO !<br>RETORNE À TELA DE LOGIN E TENTE NOVAMENTE.</strong>";
                echo "<br><br><br><br>";
                echo "</div>";
}
?>
        <div class="logomarca"></div> 
</body>
</html>