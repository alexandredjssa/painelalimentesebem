<?php

session_start();

include "conexao.php"; //Arquivo de conexão

$email = ($_POST["email"]);
$senha = ($_POST["senha"]);

        $comando = $conexao->prepare("SELECT * FROM adm where email = ? AND senha = ?");
        $comando->bindParam(1, $email);
        $comando->bindParam(2, $senha);
        $comando->execute();

        $dado=$comando->fetch(PDO::FETCH_OBJ);

        if($dado > 0)
        {
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            header("Location: painel.php");
        }
        
        else
        {
            unset($_SESSION["email"]);
            unset($_SESSION["senha"]);
            echo '<SCRIPT>window.alert("Usuario ou senha incorretos, tente novamente!")
              window.location.href="index.php"</SCRIPT>';
        }
            

?>

