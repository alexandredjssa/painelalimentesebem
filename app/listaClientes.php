<!DOCTYPE html>
<html>
	<head>
        <script src="../js/scripts.js"></script>
		<link rel="icon" href="../IMG/favicon.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>
		Cadastro de Clientes - Dr. PC
		</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="../CSS/new.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body style="background-color: #8b8589;">
		<?php 
		include "conexao.php";

		session_start(); 

		if((!isset ($_SESSION["email"]) == true) AND (!isset ($_SESSION["senha"]) == true))
        {
        	header("Location: erro.php");
        }
		?>



		<!-- geral -->
		<div class="d-flex flex-column bd-highlight mb-3">
		  
		  <!-- Informacoes do usuario administrativo -->
		  <div class=" bg_info d-flex justify-content-between p-2 bd-highlight">
		  	<?php

		  	$email = $_SESSION["email"];
		  	$matriz = $conexao->prepare("SELECT * FROM  loginAdm WHERE usuarioAdm = ?");
		  	$matriz->BindParam(1, $email);
			$matriz->execute();				                        
			$linha = $matriz->fetch(PDO::FETCH_OBJ);
			
			?>

		  	<div class="p-2 bd-highlight text-white ">DOUTOR PC - COMPUTADORES E PERIFÉRICOS</div>
		  	<div class="p-2 bd-highlight text-white"> Hora atual &nbsp <p id="hora"></p></div>
		  	<div class=" p-2 bd-highlight text-white ">Olá, <?php echo $linha->nomeAdm;?> &nbsp<a href="logoutAdmPHP.php" name="logout"><img src="IMG/sair.png" width="30px" height="30px" title="Sair"></a> </div>

		  </div>

		  <!-- menu -->
		  <div class="bg-white shadow-sm">
		
		  	<!-- Botoes -->
			<nav>
				 <ul class="menuAdm">
						<li><a href="painel.php"><img src="../IMG/homeAdm.png" width="20" height="20" title="Home"> </a></li>
							<li><a href="#">Pedidos</a>
								<ul>
					                  <li><a href="#">Visualizar</a></li>
					                  <li><a href="#">Categorias</a></li>
					       		</ul>
							</li>
					  		<li><a href="listaProdutos.php">Produtos</a>
					         	<ul>
					                  <li><a href="produtos.php">Cadastrar</a></li>
					            </ul>
							</li>
						<li><a href="ListaClientes.php">Clientes</a>
							<ul>
								<li><a href="ListaClientes.php">Consultar</a></li>
					        </ul>
						</li>
						
						<li><a href="cadSlide.php">Slide</a>
							
						</li>
				</ul>
			</nav>
			<!-- Fim Botoes -->
		 
		  </div>
		  	<!-- Fim Menu -->




<?php
include "conexao.php";
?>
<!-- -------------- conteudo ---------------------------------------------------------------------------------------------------------------->
<div class="brTitPag shadow-sm p-2 font-weight-bold">
<img src="../IMG/lista.png" width="40" height="40" title="Home"> &nbsp Clientes cadastrados
</div>



			
			<div class="d-flex flex-row  bg-white m-1 shadow-sm p-2 rounded">

				<div class="d-flex flex-column bd-highlight mb-3 w-100">
						  	
					<div class="p-2 bd-highlight ">
							  	
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="painel.php">Painel</a></li>
								<li class="breadcrumb-item active" aria-current="page">Clientes cadastrados</li>
							</ol>
						</nav>

					</div>

					<div class="local" style="margin: 10px">

					 <a class="btn btn-dark" href="imprimirClientes.php" name="botao" value="Imprimir" >Imprimir</a>

					</div>

					
					<div class="d-flex flex-row bd-highlight mb-3">

									<div class="d-flex bd-highlight ml-2 mr-2 w-100">

									<table class="table table-bordered  w-100 ">
									  <thead class="table-dark">
									    <tr>
									      <th scope="col">ID</th>
									      <th scope="col">CPF</th>
									      <th scope="col">Nome</th>
									      <th scope="col">Email</th>
									      <th scope="col">Nascimento</th>
									      <th scope="col">Endereço</th>
									      <th scope="col">Complemento</th>
									      <th scope="col">CEP</th>
									      <th scope="col">Bairro/Cidade/Estado</th>
									      <th scope="col">Telefone</th>
									      <th scope="col">Ação</th>
									      
									    </tr>
									  </thead>
									  <tbody>

									<?php 

									include "conexao.php";

				                        $matrizClientes = $conexao->prepare("SELECT * FROM  cliente ORDER BY idcliente ASC;");

				                        if($matrizClientes->execute())
				                        {
				                            while($linha = $matrizClientes->fetch(PDO::FETCH_OBJ))
				                            {                                               

											  	echo '<tr>';
											    echo '<th class="align-middle text-center" scope="row">'.$linha->idcliente.'</th>';	
											    echo '<td class="align-middle">'.$linha->cpf.'</td>';
											    echo '<td class="align-middle">'.$linha->nomecliente.' '.$linha->sobrenome.'</td>';
											    echo '<td class="align-middle">'.$linha->email.'</td>';
											    echo '<td class="align-middle text-center">'.$linha->nasc.'</td>';   
											    echo '<th class="align-middle text-center">'.$linha->logadouro.' N°'.$linha->numero.'</th>';
											    echo '<td class="align-middle">'.$linha->complemento.'</td>';
											    echo '<td class="align-middle">'.$linha->cep.'</td>';
											    echo '<td class="align-middle text-center">'.$linha->bairro. ', ' .$linha->cidade. ', ' .$linha->estado.'</td>';
											    echo '<td class="align-middle text-center">'.$linha->telefone.'</td>';
											    echo '<td class="align-middle">
											    <a class="ml-2" href="excluirCliente.php?id='.$linha->idcliente.'" name="botao" value="Excluir"><img src="IMG/excluir.png" width="20px" height="20px" title="Excluir" ></a>';
											    
											    
											    echo '</tr>';
											}
										}
									?>
									  </tbody>
									</table>
									</div>
								
					</div>

				</div>
			</div> 



<!----------------- conteudo ---------------------------------------------------------------------------------------------------------------->
		  

		  		
		  
		  <!-- rodape -->



		
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
				</script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
				</script>


	</body>
</html>