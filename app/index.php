<!DOCTYPE html>
<html>
	<head>
        <script src="js/scripts.js"></script>
		<link rel="icon" href="IMG/logo.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>
		Login painel de controle - Alimente-se bem!
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/new.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body id="bodyAdmin">

		<?php 
		session_start(); 

		if((isset ($_SESSION["email"]) == true) AND (isset ($_SESSION["senha"]) == true))
        {
        	header("Location: painel.php");
        }
		?>



		<div class="d-flex flex-column  justify-content-center ">

			<div id="divLoginAdm" class="bd-highlight text-center">
					
					<img class="mt-3" src="IMG/logo.png">
					<h6 class="text-uppercase text-white text-sm">
						<hr class="border-white" >
						ALIMENTE-SE BEM! ACESSO AO PAINEL DE CONTROLE
						<hr class="border-white">
					</h6>

			</div>

			<div id="divLoginAdm" class="shadow p-3 border border-info rounded bg-white "> 

  				<div class="p-2 bd-highlight">
  					
  					<form id="FormAdmin" method="POST" action="loginPHP.php">

  						<div class="p-2 bd-highlight font-weight-bold">Email</div>
						
						<div class="p-2 bd-highlight">
							<input id="email" class="form-control" type="text" name="email" placeholder="seuemail@dominio.com.br">
						</div>
						
						<div class="p-2 bd-highlight font-weight-bold">Senha</div>
						
						<div class="p-2 bd-highlight">
							<input id="senha" class="form-control" type="password" name="senha" placeholder="Senha">
						</div>
						
						<div class="p-2 bd-highlight">
							<input id="btnLogarAdmin" class="btn btn-primary"  type="submit" name="Logar" value="Logar">
						</div>

						<div id="msgErroLogin" class="p-2 bd-highlight">
							
						</div> 						
  					</form>
  				
  				</div>
			
			</div>

		</div>	

		
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
				</script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
				</script>
	</body>
</html>