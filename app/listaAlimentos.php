<!DOCTYPE html>
<html>
	<head>
        <script src="js/scripts.js"></script>
		<link rel="icon" href="IMG/logo.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta charset="utf-8"/>
		<title>
		Lista de alimentos cadastrados
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/new.css">
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
		  <div class=" bg_info d-flex justify-content-between bd-highlight">

		  	<?php

		  	$email = $_SESSION["email"];

		  	$matriz = $conexao->prepare("SELECT * FROM  adm WHERE email = '$email';");

			$matriz->execute();
				                        
			$linha = $matriz->fetch(PDO::FETCH_OBJ);
			
			?>

		  	<div class="p-2 bd-highlight text-white "><img src="IMG/logo.ico" width="30px" height="30px">ALIMENTE-SE BEM</div>
		  	<div class="p-2 bd-highlight text-white"></div>
		  	<div class=" p-2 bd-highlight text-white ">Olá, <?php echo $linha->Nome;?> &nbsp<a href="logoutAdmPHP.php" name="logout"><img src="IMG/sair.png" width="30px" height="30px" title="Sair"></a> </div>

		  </div>

		  <!-- menu -->
		  <div class="bg-white shadow-sm">
		
		  	<!-- Botoes -->
			<nav>
				 <ul class="menuAdm">
						<li><a href="painel.php">
							<img src="IMG/homeAdm.png" width="20" height="20" title="Home">
						</a></li>
						<li><a href="listaAlimentos.php">Alimentos</a>
							<ul>
					            <li><a href="cadAlimentos.php">Cadastrar</a></li>
					        </ul>
						</li>
					  	<li><a href="cadSlide.php">Slide</a></li>
						<li><a href="#">Usuários</a></li>
						<li><a href="gadgets.php">Gadgets</a></li>
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
<img src="IMG/lista.png" width="40" height="40" title="Home"> &nbsp Alimentos cadastrados
</div>



			
			<div class="d-flex flex-row  bg-white m-1 shadow-sm p-2 rounded">

				<div class="d-flex flex-column bd-highlight mb-3 w-100">
						  	
					<div class="p-2 bd-highlight ">
							  	
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="painel.php">Painel</a></li>
								<li class="breadcrumb-item active" aria-current="page">Alimentos cadastrados</li>
							</ol>
						</nav>

					</div>

					
					<div class="d-flex flex-row bd-highlight mb-3">

									<div class="d-flex bd-highlight ml-2 mr-2 w-100">

									<table class="table table-bordered  w-100 ">
									  <thead class="table-dark">
									    <tr>
									      <th scope="col">ID</th>
									      <th scope="col">Imagem</th>
									      <th scope="col">Grupo</th>
									      <th scope="col">Nome</th>
									      <th scope="col">Porção</th>
									      <th scope="col">Calorias</th>
									      <th scope="col">Ação</th>
									    </tr>
									  </thead>
									  <tbody>

									<?php 

									include "conexao.php";

				                        $matrizProdutos = $conexao->prepare("SELECT * FROM  alimentos ORDER BY idAlimento ASC;");

				                        if($matrizProdutos->execute())
				                        {
				                            while($linha = $matrizProdutos->fetch(PDO::FETCH_OBJ))
				                            {                                               

											  	echo '<tr>';
											    echo '<th class="align-middle text-center" scope="row">'.$linha->idAlimento.'</th>';
											    echo '<td class="align-middle"><img class=""  src="IMG/'.$linha->Imagem.'" title="'.$linha->Imagem.'" class="border" width="60px" height="60px"></td>';
											    echo '<td class="align-middle">'.$linha->Grupo.'</td>';
											    echo '<td class="align-middle">'.$linha->Nome.'</td>';
											    echo '<td class="align-middle">'.$linha->Peso.'g </td>';
											    echo '<td class="align-middle">'.$linha->Porcao.' Kcal</td>';
											    echo '<td class="align-middle">
											    <a class="ml-2" href="editarAlimento.php?id='.$linha->idAlimento.'"><img src="IMG/editar.png" width="20px" height="20px"  title ="Editar"></a>
											    <a class="ml-2" href="excluirAlimento.php?id='.$linha->idAlimento.'" name="botao" value="Excluir"><img src="IMG/excluir.png" width="20px" height="20px" title="Excluir" ></a>';
											    
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