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
	<body style="background: #424242;">

<?php
include "conexao.php";
?>

		<!-- geral -->
		<div class="d-flex flex-column bd-highlight">

						<div class="buscaFixa fixed-top clearfix" style="background: #424242;">
							<form id="FormBusca"  method="GET" action="listaAppDark.php" class="form-inline mt-2 ">
						      <input id="form-control" name="CampoBusca" class="form-control border-bottom border-white w-75 align-middle ml-2 mr-2" type="search" placeholder="Buscar alimento" aria-label="Pesquisar">
						      <button id="btn_busca" name="btBusca" value="Buscar" class="btn" type="submit"><img src="IMG/lupaDark.png" width="30px" height="30px" title="Pesquisar"></button>
						    </form>

						    <hr class="border-bottom border-white">

						</div>

						    <div id="contentLista" class="text-white">
						    <!-- Inico da lista de alimentos -->

						    <?php

                        include "conexao.php";

                        $inpBusca = $_GET["CampoBusca"];
                        $botaoBusca = $_GET["btBusca"];


                        if($botaoBusca != "Buscar"){

						$matriz = $conexao->prepare("SELECT * FROM alimentos ORDER BY Nome");

                        if($matriz->execute())
                        {
                            while($linha = $matriz->fetch(PDO::FETCH_OBJ))
                            {                                               
                                  echo '
                                  
                                  <div class="d-flex flex-column bd-highlight mb-2 clearfix text-white">
									  	<div class="ml-2 mr-2 bd-highlight">
									  	
									  	<div class="d-flex flex-row bd-highlight border border-white rounded">
										  	<div class="bd-highlight">
										  		<!-- Imagem do alimento -->
										  		<a type="button" class="" href="alimentoDark.php?id='.$linha->idAlimento.'">
										  		<img src="IMG/'. $linha->Imagem .'" class="m-1 bg-white" width="110px" height="110px"></a>
										  	</div>
			  								<div class="bd-highlight border-left border-white mt-1 mb-1 pl-2">
			  									<div class="d-flex flex-column bd-highlight">
												  <div class="bd-highlight mb-1"><span class=" font-weight-bold ">Nome:</span> '. $linha->Nome .' </div>
												  <div class="bd-highlight mb-1"><span class=" font-weight-bold ">Grupo: </span>'. $linha->Grupo .'</div>
												  <div class="bd-highlight mb-1"><span class=" font-weight-bold ">Porção: </span>'. $linha->Peso .'g</div>
												  <div class="bd-highlight"><span class=" font-weight-bold ">Calorias:</span> '. $linha->Porcao .' Kcal</div>
												</div>

			  								</div>
		  								</div>

									  </div>
									</div>';

                            }
                         }

                     }else if($botaoBusca == "Buscar")

                        {

                            $matriz = $conexao->prepare("SELECT * FROM alimentos  
                                                         WHERE Nome 
                                                        LIKE '%$inpBusca%'; ORDER BY Nome");

                            if($matriz->execute())
                            {
                                while($linha = $matriz->fetch(PDO::FETCH_OBJ))
                                {    

                                echo '<div class="d-flex flex-column bd-highlight mb-2 clearfix">
									  	<div class="ml-2 mr-2 bd-highlight">
									  	
									  	<div class="d-flex flex-row bd-highlight border border-primary rounded">
										  	<div class="bd-highlight">
										  		<a type="button" class="" href="alimentoDark.php?id='.$linha->idAlimento.'">
										  		<img src="IMG/'. $linha->Imagem .'" class="m-1 bg-white" width="110px" height="110px"></a>
										  	</div>
			  								<div class="bd-highlight border-left border-white mt-2 mb-2 pl-2">
			  									<div class="d-flex flex-column bd-highlight">
												  <div class="bd-highlight mb-1"><span class=" font-weight-bold ">Nome:</span> '. $linha->Nome .' </div>
												  <div class="bd-highlight mb-1"><span class=" font-weight-bold ">Grupo: </span>'. $linha->Grupo .'</div>
												  <div class="bd-highlight mb-1"><span class=" font-weight-bold ">Porção: </span>'. $linha->Peso .'g</div>
												  <div class="bd-highlight"><span class=" font-weight-bold ">Calorias:</span> '. $linha->Porcao .' Kcal</div>
												</div>

			  								</div>
		  								</div>

									  </div>
									</div> ';                                          
                                }
                             }
                        }

                    ?>
</div>
			<div class="d-flex flex-row  bg-white">

				<div class="d-flex flex-column bd-highlight w-100">
						  					
					<div class="d-flex flex-row bd-highlight">

						</div>
								
					</div>

				</div>
			</div> 
	
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
				</script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
				</script>


	</body>
</html>