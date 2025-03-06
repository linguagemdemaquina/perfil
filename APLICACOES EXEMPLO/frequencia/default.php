
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
        <div class="div_titulo_secao">
            <i class="fa-solid fa-key"></i>
            <h2>EFETIVO - UNIDADE DE AMÔNIA</h2>
            <h2>LOGIN</h2>
        </div>
        <div class="div_principal_detalhe"></div>
            <div class="div_interna_login">
            <form action="menu_principal.php" method="post">
                <label for="matricula">MATRÍCULA:</label><br>
                <input type="text" size="14" id="matricula" name="matricula"><br>
                <br>
                <label for="senha">SENHA:</label><br>
                <input type="password" size="14"  id="senha" name="senha">
                <br><br>
                <input type="hidden" id="verificador" name="verificador" value="0">
                <input type="submit" class="botao_formulario" id="entrar" name="entrar" value="ENTRAR">
            </form>
           </div>
        <div class="div_principal_detalhe"></div>
        <br>
        <br>
        <div class="logomarca"></div> 
</body>
</html>