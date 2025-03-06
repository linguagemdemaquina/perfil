<?php include_once 'configuracao/config.php' ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recaptcha V3 - Padrão de Configuração</title>
        <link rel="icon" type="image/png" href="../../../2025/imagens/icones/icone.png">
        <script src="https://www.google.com/recaptcha/enterprise.js?render=<?php echo CHAVE_SITE ?>"></script>
        <script src="js/toast.js"></script>
        <link rel="stylesheet" type="text/css" href="css/folhadeestilos.css?data=<?php echo date("Y-m-d H:i:s"); ?>">   
    </head>
<body>
    <div id="container">
    <form id="formulario_recaptcha_v3" name="formulario_recaptcha_v3" action="default.php" method="post">
        <input type="image" src="../../../2025/imagens/logomarca_grande.png" alt="logomarca">
        <label for="nome">Nome:</label>    
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required><br>
        <label for="nome">Email:</label>    
        <input type="email" id="email" name="email" placeholder="Digite seu email" require><br>
        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" placeholder="Digite sua mensagem" require></textarea>
        <button type="submit" id="botao_enviar" value="submit">Enviar</button>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"><br>
    </form>
    <br>
    <?php 
    if($validacao == true && $mensagem_escore > 0.5){
        echo '<div id="toast"><h3>Formulário processado com sucesso !</h3><br>Escore gerado pelo reCaptcha V.3 : ' .$mensagem_escore. '. <br>Horário de validação do reCaptcha : ' .$data_hora_validacao. '. <br><br>Você não é um robô.<br></div>';
        echo '<script>showToast()</script>';
     }
     elseif($validacao == true && $mensagem_escore < 0.5){
        echo '<div id="toast"><h3>Formulário não processado !</h3><br>Este é o escore gerado pelo reCaptcha V.3 : ' .$mensagem_escore. '. <br><br>Você é um robô.<br></div>';
        echo '<script>showToast()</script>';
     }
     elseif($validacao == false){
        echo '<div id="toast"><h3>Formulário não processado !</h3><br>Você é um robô.<br></div>';
     }
     else{
        echo '<div id="toast"></div>';
     }
    ?>
    </div>
    <script>
            grecaptcha.enterprise.ready(function()
            {
                grecaptcha.enterprise.execute('<?php echo CHAVE_SITE ?>', {action: 'HOMEPAGE'}).then(function(token)
                {
                    document.getElementById('g-recaptcha-response').value = token;
                    console.log(token);
                });
            });
     </script>
</body>
</html>