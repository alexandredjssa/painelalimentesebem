<?php

    require_once 'dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

include "conexao.php";

         try

         {
         	$MatrizClientes = $conexao->prepare("SELECT * FROM  cliente ORDER BY idcliente ASC;");
         	$MatrizClientes->execute();

         	$Relat = '';
         	$Relat .= '<table >';
         	$Relat .= '<tr>';
         	$Relat .= '<th cope="col"> ID </th>';
         	$Relat .= '<th> CPF </th>';
         	$Relat .= '<th> Nome completo </th>';
 //        	$Relat .= '<th> Email </th>';
         	$Relat .= '<th> Nascimento </th>';
            $Relat .= '<th> Endereço </th>';
         	$Relat .= '<th> complemento </th>';
         	$Relat .= '<th> CEP </th>';
         	$Relat .= '<th> Bairro/ Cidade/ Estado </th>';
         	$Relat .= '<th> Telefone </th>';
         	$Relat .= '<th> Informação adicional </th>';
         	$Relat .= '</tr>';

         	while ($Linha = $MatrizClientes->fetch(PDO::FETCH_OBJ)) 
         	{
         		$Relat .= '<tr>';
         		     $Relat .= '<td>' . $Linha->idcliente . '</td>';
         		     $Relat .= '<td>' . $Linha->cpf . '</td>';
         		     $Relat .= '<td>' . $Linha->nomecliente . ' ' . $Linha->sobrenome . '</td>';
     //    		     $Relat .= '<td>' . $Linha->email . '</td>';
         		     $Relat .= '<td>' . $Linha->nasc . '</td>';
         		     $Relat .= '<td>' . $Linha->logadouro . ',' . $Linha->numero . '</td>';
         		     $Relat .= '<td>' . $Linha->complemento . '</td>';
                     $Relat .= '<td>' . $Linha->cep . '</td>';
         		     $Relat .= '<td>' . $Linha->bairro . ' , ' . $Linha->cidade . ' , ' . $Linha->estado . '</td>';
         		     $Relat .= '<td>' . $Linha->telefone . '</td>';
         		     $Relat .= '<td>' . $Linha->adccliente . '</td>';
         		$Relat .= '</tr>';
         	}

         	    $Relat .= '</table>';







         	/*    $Relat .= '';
         	    $Relat .= '<table>';
         	    $Relat .= '<tr>';
         	    $Relat .= '<th> Bairro/Cidade/Estado </th>';
         	    $Relat .= '<th> Telefone </th>';
              	$Relat .= '<th> Informação adicional </th>';
         	    $Relat .= '</tr>';

         	    while ($Linha = $MatrizClientes->fetch(PDO::FETCH_OBJ)) 
         	    {
         		$Relat .= '<tr>';
         		     $Relat .= '<td>' . $Linha->bairro . ' , ' . $Linha->cidade . ' , ' . $Linha->estado . '</td>';
         		     $Relat .= '<td>' . $Linha->telefone . '</td>';
         		     $Relat .= '<td>' . $Linha->adccliente . '</td>';
         		$Relat .= '</tr>';
         	    }
         	    $Relat .= '</table>'; */








         	



            
         	$dompdf->load_Html('<h1 style="text-align: center;">Relatorio de Clientes</h1>' . $Relat );

         	$dompdf->setPaper('A4', 'portrait');

         	$dompdf->render();

         	$dompdf->stream("relatorio.pdf", array("Attachment" => false)); 

         }
         catch (PDOException $erro) 
         {
         	echo "Erro: ".$erro->getMessage();
         }
?>