<!DOCTYPE html>
<html>
	<head>
        <script src="../js/scripts.js"></script>
		<link rel="icon" href="../IMG/favicon.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>
		Cadastro de Produtos - Dr. PC
		</title>
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

		  	$matriz = $conexao->prepare("SELECT * FROM  loginAdm WHERE usuarioAdm = '$email';");

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
						<li><a href="#">Clientes</a>
							<ul>
								<li><a href="#">Consultar</a></li>
								<li><a href="#">Alterar</a></li>
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
<img src="../IMG/slide.png" width="40" height="40" title="Home"> &nbsp Cadastro de produtos
</div>



			
			<div class="d-flex flex-row  bg-white m-1 shadow-sm p-2 rounded">

						<div class="d-flex flex-column bd-highlight mb-3 w-100">
						  	
						  	<div class="p-2 bd-highlight">
							  	
							  	<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><a href="painel.php">Painel</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Cadastro de Slides</li>
								  </ol>
								</nav>

							</div>
					
					<div class="d-flex flex-row bd-highlight mb-3">

						  <div class="p-2 bd-highlight">
						  	<div class="d-flex bg-white border border-primary m-3 shadow-sm p-5 rounded">


							<div class="d-flex flex-column bd-highlight mb-3">
							  
							

							<div class="p-2 bd-highlight text-center h5">Slides disponiveis</div>

							<?php 

									include "conexao.php";

				                        $matrizProdutos = $conexao->prepare("SELECT * FROM  slide ORDER BY idImagem DESC;");

				                        if($matrizProdutos->execute())
				                        {
				                            while($linha = $matrizProdutos->fetch(PDO::FETCH_OBJ))
				                            {                                               

											  	echo '<div class="p-2 bd-highlight text-center"><img src="IMG/slide/'.$linha->linkImagem.'" class="border" width="80px" height="80px"></div>';
												echo '<div class="p-2 bd-highlight text-center">'.$linha->nomeImagem.'</div>';
												echo '<br>'.$linha->estatus.'';
												echo '<td class="align-middle">
											    <input class="text-danger border-danger rounded p-1 bg-white" type="submit" name="Excluir" value="Excluir">
											    <input class="text-primary border-primary rounded p-1 bg-white" type="submit" name="Editar" value="Editar"></td>';

											}
										}
									?>

							</div>

							

						

							</div>
						</div>



						  <div class="p-2 bd-highlight">

				<form id="formCadProd" class="ml-5" method="POST" action="cadastroSlidePHP.php" enctype="multipart/form-data">

					<table>

						<tr>
							<td class="text-right"><label>Nome do Slide</label></td>
							<td><input id="nomeProduto" class="border m-2  border-primary rounded p-2" type="text" name="nomeImagem" size="60"required></td>
						</tr>

						<tr>
							<td class="text-right" ><label>Imagen</label></td>
							<td><input id="imgProduto" class="border m-2  border-primary rounded p-2" type="file" name="arquivo" required></td>
						</tr>

							<tr>
							<td class="text-right"><label>Imagem inicial?</label></td>
							<td><input type="checkbox" id="catProduto" class="border m-2 border-primary rounded p-2" list="listaCategoria" name="estatus">


						</td>
						</tr>



						<tr>
							<td colspan="2">
								<center>
									<input id="btnCadastrar" class="btn btn-primary"  type="submit" name="Cadastrar" value="Cadastrar">
									<input id="btnLimpar" class="btn btn-primary"  type="reset" name="Limpar" value="Limpar dados">
								</center>
							</td>
						</tr>

					</table>					
  					</form>


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