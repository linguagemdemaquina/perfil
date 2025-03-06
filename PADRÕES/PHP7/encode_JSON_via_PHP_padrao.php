<?php 

$objetoJSON = new stdClass();
$objetoJSON->variavel_1 = "Marcelo";
$objetoJSON->variavel_2 = 47;
$objetoJSON->variavel_3 = "Fortaleza";

$saidaJSON = json_encode($objetoJSON);

echo $saidaJSON;

?>