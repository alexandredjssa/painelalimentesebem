<?php

include "conexao.php";

$idAlimento = $_GET['id'];

$matriz = $conexao->prepare("DELETE FROM alimentos WHERE idAlimento = ?");
$matriz->bindParam(1, $idAlimento);
                        
$matriz->execute();

echo '<SCRIPT>window.alert("Produto excluido com sucesso!")
              window.location.href="listaAlimentos.php"</SCRIPT>';


?>