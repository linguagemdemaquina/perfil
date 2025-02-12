
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

        //CONSULTA DE VERIFICADOR DE ACESSO
    
        $verificador = $_POST['verificador'];

        if ($verificador == 0){
        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];

        // CONSULTA SQL PARA VERIFICADOR EM 0
        $sql = "SELECT * FROM funcionarios WHERE matricula = '$matricula' && senha ='$senha'";
    
        }
        else if($verificador == 1){
        $matricula = $_GET['matricula'];

        // CONSULTA SQL PARA VERIFICADOR EM 1
        $sql = "SELECT * FROM funcionarios WHERE matricula = '$matricula'";

        }
        if ($verificador == 0 || $verificador ==1) {
            
            $resultado = $mysqli -> query($sql);
        
            // CONTABILIZA QUANTOS ESTÃO LOGADOS
            $quantitativo = mysqli_num_rows($resultado); 

        }
        else{

            $quantitativo = 0;
        }
        ?>
        <div class="div_titulo_secao">
            <i class="fa-solid fa-house"></i>
            <h2>EFETIVO - UNIDADE DE AMÔNIA</h2>
            <h3>MENU PRINCIPAL</h3>
        </div>
        <div class="div_principal_detalhe"></div>
            <div class="div_interna_detalhe">
            <?php

            // VALIDA APENAS 1 USUÁRIO - ACESSO AUTORIZADO
            if ($quantitativo == 1) {

                    $verificador = 1;
        
                    foreach ($resultado as $linha) {

                    $nome = $linha['nome'];
                    $matricula = $linha['matricula'];
            
                    echo "<strong>LOGADO COMO : </strong>";
                    echo $nome;
                    echo " - <strong>MATRÍCULA :  </strong>";
                    echo $matricula;

                    // ESTRUTURA DO MENU DE BOTÕES

                    echo "<div class=\"div_geral_menu_botoes\">";

                    // ESTRUTURA DOS BOTÕES

                    ?>
                       
                       <div class="div_botao_menu">
                            <form action="efetivo.php" method="post">
                                <input type="submit" value="EFETIVO" class="botao_formulario" id="botao_efetivo" name="botao_efetivo">
                                <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                                <input type="hidden" name="verificador" value="<?php echo $verificador; ?>">
                            </form>
                        </div>
                        <div class="div_botao_menu">
                            <form action="maf.php" method="post">
                                <input type="submit" value="MAF" class="botao_formulario" id="botao_efetivo" name="botao_efetivo">
                                <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                                <input type="hidden" name="verificador" value="<?php echo $verificador; ?>">
                            </form>
                        </div>
                        <div class="div_botao_menu">
                            <form action="relatorios.php" method="post">
                                <input type="submit" value="RELATORIOS" class="botao_formulario" id="botao_efetivo" name="botao_efetivo">
                                <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                                <input type="hidden" name="verificador" value="<?php echo $verificador; ?>">
                            </form>
                        </div>
                        <div class="div_botao_menu">
                            <form action="perfil.php" method="post">
                                <input type="submit" value="PERFIL" class="botao_formulario" id="botao_efetivo" name="botao_efetivo">
                                <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                                <input type="hidden" name="verificador" value="<?php echo $verificador; ?>">
                            </form>
                        </div>

                   <?php
                    
                    // FINAL DO "for each"
                    echo "</div>";

                    }
             }
            else{
            // ACESSO NÃO AUTORIZADO

                echo "<br><br><br>";
                echo "<strong>ACESSO NÃO AUTORIZADO !<br>RETORNE À TELA DE LOGIN E TENTE NOVAMENTE.</strong>";
                echo "<br><br><br><br>";
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