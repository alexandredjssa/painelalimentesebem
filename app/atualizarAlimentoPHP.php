<?php

include "conexao.php";

$idAlimento   = $_POST['idAlimento'];
$nome         = $_POST['nomeAlimento'];
$grupo        = $_POST['grupoAlimento'];
$descricao    = $_POST['descricao'];
$peso         = $_POST['Peso'];
$porcao       = $_POST['Porcao'];



//------------- Upload de fotos -----------------

$arquivoAtual = $_FILES['arquivo']['name'];
$arquivoTmp   = $_FILES['arquivo']['tmp_name'];
$destino      = 'IMG/' . $arquivoAtual;

$arquivoAtualTabela = $_FILES['tabela']['name'];
$arquivoTmpTabela   = $_FILES['tabela']['tmp_name'];
$destinoTabela      = 'IMG/' . $arquivoAtualTabela;


//------------- Cadastro do Produto -------------



        move_uploaded_file($arquivoTmp, $destino);
        move_uploaded_file($arquivoTmpTabela , $destinoTabela );

        $buscaImg=$conexao->prepare("SELECT Imagem 
                                     FROM alimentos 
                                     WHERE  idAlimento = '$idAlimento';");
        $buscaImg->execute();

        $linha = $buscaImg->fetch(PDO::FETCH_OBJ);

        if($arquivoAtual == false)
        {

        $comando=$conexao->prepare("UPDATE  alimentos 
                                    SET     Grupo = ?, 
                                            Nome = ?,
                                            Imagem = ?,
                                            Descricao = ? ,
                                            Porcao = ?,
                                            Peso = ?,
                                            ImgTabela = ?
                                    WHERE   idAlimento = '$idAlimento';");

        $comando->bindParam(1, $grupo);
        $comando->bindParam(2, $nome);
        $comando->bindParam(3, $linha->Imagem);
        $comando->bindParam(4, $descricao);
        $comando->bindParam(5, $porcao);
        $comando->bindParam(6, $peso);
        $comando->bindParam(7, $linha->ImgTabela);


        $comando->execute();
        
       echo'<SCRIPT>
            window.alert("Produto atualizado")
            window.location.href="editarAlimento.php?id='.$idAlimento.'"
            </SCRIPT>';
        }else{
            $comando=$conexao->prepare("UPDATE  alimentos 
                                        SET     Grupo = ?, 
                                                Nome = ?,
                                                Imagem = ?,
                                                Descricao = ? ,
                                                Porcao = ?,
                                                Peso = ?,
                                                ImgTabela = ?
                                        WHERE   idAlimento = '$idAlimento';");

        $comando->bindParam(1, $grupo);
        $comando->bindParam(2, $nome);
        $comando->bindParam(3, $arquivoAtual);
        $comando->bindParam(4, $descricao);
        $comando->bindParam(5, $porcao);
        $comando->bindParam(6, $peso);
        $comando->bindParam(7, $arquivoAtualTabela);

        
        $comando->execute();
        
       echo'<SCRIPT>
            window.alert("Produto atualizado")
            window.location.href="editarAlimento.php?id='.$idAlimento.'"
            </SCRIPT>';
        }

?>