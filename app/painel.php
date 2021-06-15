<!DOCTYPE html>
<html>
	<head>
        <script src="js/scripts.js"></script>
		<link rel="icon" href="IMG/logo.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta charset="utf-8"/>
		<title>
		Painel de controle
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

<!-- -------------- conteudo ---------------------------------------------------------------------------------------------------------------->
<div class="brTitPag shadow-sm p-2 font-weight-bold">
<img src="IMG/controle.png" width="40" height="40" title="Home"> &nbsp Bem vindo ao painel de controle!
</div>

		
		<div class="d-flex flex-row ">

			<div class="d-flex flex-column bg-white w-100 m-1 cardContent shadow-sm p-2 rounded">

				<div class="d-flex flex-row mb-2 rounded">
					<!-- Lista de pedidos e produtos sem estoque -->
					<div class="d-flex flex-column w-50 shadow-sm rounded border border-primary">
						
						<p class="p-2 bg-primary text-white h6">ALIMENTOS CADASTRADOS</p>
					
						<div class="d-flex flex-column shadow-sm p-1 " style="height: 300px; width: auto; overflow: scroll;">
						<table class="table table-striped w-auto " style="font-size: 12px;">
									  <thead>
									    <tr>
									      <th scope="col">Imagem</th>
									      <th scope="col">Grupo</th>
									      <th scope="col">Nome</th>
									    </tr>
									  </thead>
									  <tbody>
							<?php 

									include "conexao.php";

				                        $matrizProdutos = $conexao->prepare("SELECT * FROM  alimentos ORDER BY idAlimento DESC;");

				                        if($matrizProdutos->execute())
				                        {
				                            while($linha = $matrizProdutos->fetch(PDO::FETCH_OBJ))
				                            {                                               

											  	
											    echo '<td class="align-middle p-1"><img src="IMG/'.$linha->Imagem.'" class="border" width="60px" height="60px"></td>';
											    echo '<td class="align-middle">'.$linha->Grupo.'</td>';
											    echo '<td class="align-middle">'.$linha->Nome.'</td>';
											  
											    echo '</tr>';
											}
										}
									?>
									 </tbody>
									</table>
						</div>
					
					</div>


					<div class="d-flex flex-column h-100 w-50 ml-2 shadow-sm rounded border border-danger">
					<p class="p-2 bg-danger h6 text-white">NOVOS USUÁRIOS</p>
					<!-- Produtos em Estoque -->
					<div class="d-flex flex-column shadow-sm p-1 " style="height: 300px; width: auto; overflow: scroll;">
						<table class="table table-striped w-100 " style="font-size: 12px;">
									  <thead>
									    <tr>
									      <th scope="col">Nome</th>
									      <th scope="col">Email</th>
									      <th scope="col">Idade</th>
									      <th scope="col">Peso</th>
									      <th scope="col">Altura</th>
									      <th scope="col">Ação</th>
									    </tr>
									  </thead>
									  <tbody>
							<?php 

									
				                        $matrizProdutos = $conexao->prepare("SELECT * FROM  usuario ORDER BY idUsuario ASC;");

				                        if($matrizProdutos->execute())
				                        {
				                            while($linha = $matrizProdutos->fetch(PDO::FETCH_OBJ))
				                            {                                               

											  	
											    echo '<td class="align-middle"><img src="IMG/'.$linha->Nome.'" class="border" width="40px" height="40px"></td>';
											    echo '<td class="align-middle">'.$linha->Email.'</td>';
											    echo '<td class="align-middle">'.$linha->Idade.'</td>';
											    echo '<td class="align-middle text-center">'.$linha->Peso.'</td>';
											    
											     echo '<td class="align-middle">
											    <a class="ml-2" href="editarProduto?id='.$linha->Altura.'"><img src="IMG/mais.png" width="20px" height="20px"  title ="Inserir quantidade">';
											   
											    echo '</tr>';
											}
										}
									?>
									 </tbody>
									</table>
						</div>

					
					</div>
					<!-- Fim lista de pedidos e produtos sem estoque -->
					
				</div>

				<div class="d-flex flex-column shadow-sm rounded border border-secondary">
					<p class="p-2 bg-secondary w-100 h6 text-white"><a href="Tm"></a>MENSAGEM DOS USUÁRIOS</p>

					<div class="d-flex flex-column p-1 " style="height: 300px; width: auto; overflow: scroll;">
						<table class="table table-striped w-100 " style="font-size: 12px;">
									  <thead class="thead-dark">
									    <tr>
									      <th scope="col">Nome</th>
									      <th scope="col">Email</th>
									      <th scope="col">Assunto</th>
									      <th scope="col">Mensagem</th>
									      <th scope="col">Data</th>
									      <th scope="col">Hora</th>
									      <th scope="col">Ação</th>						      
									    </tr>
									  </thead>
									  <tbody>
							<?php 

				                        $matrizMsg = $conexao->prepare("SELECT * FROM  mensagem ORDER BY idMsg DESC;");

				                        if($matrizMsg->execute())
				                        {
				                            while($linhaMsg = $matrizMsg->fetch(PDO::FETCH_OBJ))
				                            {                                               

											  	
											    echo '<td class="align-middle">'.$linhaMsg->nome.'</td>';
											    echo '<td class="align-middle">'.$linhaMsg->email.'</td>';
											    echo '<td class="align-middle">'.$linhaMsg->msg.'</td>';
											    echo '<td class="align-middle">'.$linhaMsg->dataMsg.'</td>';
											    echo '<td class="align-middle">'.$linhaMsg->horaMsg.'</td>';
											     echo '<td class="align-middle">
											    <a class="ml-2 shadow-sm" href="excluirMensagem.php?id='.$linhaMsg->idMsg.'"><img src="IMG/excluir.png" width="15px" height="15px"  title ="Excluir mensagem">';
											    echo '</tr>';
											}
										}
									?>
									 </tbody>
									</table>
					</div>
				</div>

				<!-- Contato de clientes -->
				
				<!-- Fim contato de clientes -->


			</div>
		</div>
 

		  		
		  
		  <!-- rodape -->



		
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
				</script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
				</script>
	</body>
</html>