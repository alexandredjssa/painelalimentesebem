<?php

include "conexao.php";

$grupo          = $_POST['grupoAlimento'];
$nome           = $_POST['nomeAlimento'];
$porcao         = $_POST['porcao'];
$descricao      = $_POST['descricao'];
$peso           = $_POST['peso'];
$botao          = $_POST['Cadastrar'];

//------------- Upload de fotos -----------------

$arquivoAtual = $_FILES['arquivo']['name'];
$arquivoTmp   = $_FILES['arquivo']['tmp_name'];
$destino      = 'IMG/' . $arquivoAtual;

$arquivoAtualTabela = $_FILES['tabela']['name'];
$arquivoTmpTabela   = $_FILES['tabela']['tmp_name'];
$destinoTabela      = 'IMG/' . $arquivoAtualTabela;


//------------- Cadastro do Alimento -------------

try
{

    if($botao == 'Cadastrar'){

        move_uploaded_file($arquivoTmp, $destino);
        move_uploaded_file($arquivoTmpTabela , $destinoTabela );

        $comando=$conexao->prepare("INSERT INTO alimentos (Grupo,Nome,Imagem,Descricao,Porcao,Peso,ImgTabela) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");

        $comando->bindParam(1, $grupo);
        $comando->bindParam(2, $nome);
        $comando->bindParam(3, $arquivoAtual);
        $comando->bindParam(4, $descricao);
        $comando->bindParam(5, $porcao);
        $comando->bindParam(6, $peso);
        $comando->bindParam(7, $arquivoAtualTabela);

        $comando->execute();

        if($comando->rowCount() > 0)

        {
            
            $RetornoMensagem = '<SCRIPT>
                                window.alert("Cadastro efetuado com sucesso!")
                                window.location.href="cadAlimentos.php"</SCRIPT>';

        }
        else
        {
            $RetornoMensagem = '<script> alert("Produto nao cadastrado!")</script>';
        }
    }
    
}
catch(PDOException $erro)
{
    $RetornoMensagem = "Erro: " . $erro->getMessage();
}
echo $RetornoMensagem;

?>