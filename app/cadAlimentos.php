<!DOCTYPE html>
<html>
	<head>
        <script src="js/scripts.js"></script>
		<link rel="icon" href="IMG/logo.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>
		Cadastro de Alimentos - Alimente-se bem!
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/new.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
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
		  	<div class="p-2 bd-highlight text-white"> </div>
		  	<div class=" p-2 bd-highlight text-white ">Olá, <?php echo $linha->Nome;?> &nbsp<a href="logoutAdmPHP.php" name="logout"><img src="IMG/sair.png" width="30px" height="30px" title="Sair"></a> </div>

		  </div>

		  <!-- menu -->
		  <div class="bg-white shadow-sm">
		
		  	<!-- Botoes -->
			<nav>
				 <ul class="menuAdm">
						<li><a href="painel.php">
							<img src="../IMG/homeAdm.png" width="20" height="20" title="Home">
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
<img src="../IMG/incluir.png" width="40" height="40" title="Incluir novo produto"> &nbsp Cadastro de alimentos
</div>



			
			<div class="d-flex flex-row  bg-white m-1 shadow-sm p-2 font-weight-bold rounded">

						<div class="d-flex flex-column bd-highlight mb-3 w-100">
						  	
						  	<div class="p-2 bd-highlight">
							  	
							  	<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><a href="painel.php">Painel</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Cadastro de alimentos</li>
								  </ol>
								</nav>

							</div>
					
					<div class="d-flex flex-row bd-highlight mb-3">

						  <div class="p-2 bd-highlight">

				<form id="formCadProd" class="ml-5" method="POST" action="cadastroAlimentoPHP.php" enctype="multipart/form-data">

					<table>

						<tr>
							<td class="text-right"><label>Grupo</label></td>
							<td><input id="grupoAlimento" class="border m-2  border-primary rounded p-2" list="listaCategoria" name="grupoAlimento" required>

								<datalist id="listaCategoria">
                                    <option value="01"><option value="02"><option value="03">
                                    <option value="04"><option value="05"><option value="06">
                                    <option value="07"><option value="08">
                                </datalist>

							</td>
						</tr>

						<tr>
							<td class="text-right"><label>Nome</label></td>
							<td><input id="nomeAlimento" class="border m-2  border-primary rounded p-2" type="text" name="nomeAlimento"required></td>
						</tr>
						<tr>
							<td class="text-right"> <label> Calorias</label></td>
							<td><input id="porcao" maxlength="5" class="border m-2  border-primary rounded p-2" type="number" name="porcao"required></td>
						</tr>
						<tr>
							<td class="text-right"> <label> Peso</label></td>
							<td><input id="peso" maxlength="5" class="border m-2  border-primary rounded p-2" type="number" name="peso"required></td>
						</tr>
						<tr>
							<td class="text-right" ><label> Descrição</label></td>
							<td><textarea id="descricao" rows="5" cols="30" contenteditable="true" class="border m-2  border-primary rounded p-2" type="text" name="descricao" size="50" required></textarea></td>
						</tr>

						<tr>
							<td class="text-right" ><label>Imagem</label></td>
							<td><input id="arquivo" class="border m-2  border-primary rounded p-2" type="file" name="arquivo"></td>
						</tr>

						<tr>
							<td class="text-right" ><label>Tabela</label></td>
							<td><input id="tabela" class="border m-2  border-primary rounded p-2" type="file" name="tabela"></td>
						</tr>

						<tr>
							<td colspan="2">
								<center>
									<input id="btnCadastrar" class="btn btn-primary"  type="submit" name="Cadastrar" value="Cadastrar">
									
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