<?php

$db = 'siad03';
$user = 'siad03';
$pass = '4l3x4ndr3';

try
{
    $conexao = new PDO("mysql:host=mysql.siad.net.br; dbname=$db", "$user", "$pass");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
}
catch (PDOException $erro)
{
    echo "Erro de conexão:" . $erro->getMessage();
}
?>