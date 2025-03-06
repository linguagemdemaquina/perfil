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
?> 

<!-- CONTEÚDO VAI AQUI -->

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