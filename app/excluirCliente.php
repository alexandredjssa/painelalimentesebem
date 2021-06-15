<?php

include "conexao.php";

$idcliente = $_GET['id'];

$matriz = $conexao->prepare("DELETE FROM cliente WHERE idcliente = ?");
$matriz->bindParam(1, $idcliente);
                        
$matriz->execute();

echo '<SCRIPT>window.alert("Produto excluido com sucesso!")
              window.location.href="listaClientes.php"</SCRIPT>';


?>