<!DOCTYPE html>
<html>
	<head>
        <script src="js/scripts.js"></script>
		<link rel="icon" href="IMG/favicon.ico">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title>
		Bem vindos ao DR. PC - Maior site de computadores do Brasil.
		</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/new.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>

		<?php
            include "conexao.php";

            $idAlimento = $_GET['id'];
            $matriz = $conexao->prepare("SELECT * FROM alimentos WHERE idAlimento = '$idAlimento';");
            $matriz->execute();
            $linha = $matriz->fetch(PDO::FETCH_OBJ);
        ?>

		<div class="d-flex flex-column bd-highlight mb-3">
			<!-- Imagem do alimento -->
			<div class="p-2 bd-highlight text-left"><a href="listaApp.php"><img src="IMG/imgVoltar.png" width="70px" height="40px" title="Voltar"></a></div>
			<div class="p-2 bd-highlight text-center h4"><?php echo $linha->Nome; ?></div>
		  <div class="p-2 bd-highlight">
		  	<?php echo '<img src="IMG/'.$linha->Imagem.'" class="img-fluid">';?> </div>
		  <div class="p-2 bd-highlight text-center h4">Tabela nutriconal</div>
		  <div class="p-2 bd-highlight">
		  	<?php echo '<img src="IMG/'.$linha->ImgTabela.'" class="img-fluid">';?></div>
		  <div class="formatArea p-2 bd-highlight text-justify"><?php echo $linha->Descricao; ?></div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
		</script>
	</body>
</html>