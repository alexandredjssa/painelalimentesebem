<?php

include "conexao.php";

$idMsg = $_GET['id'];

$matriz = $conexao->prepare("DELETE FROM mensagem WHERE idMsg = ?");
$matriz->bindParam(1, $idMsg);
                        
$matriz->execute();

echo '<SCRIPT>window.location.href="painel.php#Tm"</SCRIPT>';


?>