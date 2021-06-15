<?php

include "conexao.php";

$nome       = $_POST['nomeImagem'];
$estatus    = $_POST['estatus'];
$botao      = $_POST['Cadastrar'];

//------------- Upload de fotos -----------------

$arquivoAtual = $_FILES['arquivo']['name'];
$arquivoTmp   = $_FILES['arquivo']['tmp_name'];
$destino      = 'IMG/slide/' . $arquivoAtual;


//------------- Cadastro do Produto -------------


    if($botao == 'Cadastrar'){

        $comando=$conexao->prepare("SELECT * FROM slide;");

        $comando->execute();             

        if ($comando->rowCount() == 0) {

            $estatus = 'active';

        }elseif ($comando->rowCount() > 4) {

            $comando=$conexao->prepare("DELETE FROM slide WHERE idImagem > 4 AND estatus IS NULL;");

             $comando->execute(); 
            
        }

        if ($estatus == true) {

            $comando=$conexao->prepare("UPDATE slide SET estatus = NULL WHERE estatus LIKE 'active';");

             $comando->execute();         
        

             $estatus = 'active';

        }

        move_uploaded_file($arquivoTmp, $destino);

        $comando=$conexao->prepare("INSERT INTO slide (nomeImagem,linkImagem,estatus) VALUES (?, ?, ?)");

        $comando->bindParam(1, $nome);
        $comando->bindParam(2, $arquivoAtual);
        $comando->bindParam(3, $estatus);

        
        $comando->execute();
        
        if($comando->rowCount() > 0)

        {
            
            $RetornoMensagem = '<SCRIPT>
                                window.alert("Cadastro efetuado com sucesso!")
                                window.location.href="cadSlide.php"</SCRIPT>';
         
        }
        else
        {
            $RetornoMensagem = '<script> alert("Produto nao cadastrado!")</script>';
        }
    }
    

echo $RetornoMensagem;

?>