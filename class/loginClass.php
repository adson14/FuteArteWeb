<?php

include_once("conexao.php");

$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];

if (isset($entrar)) {

    $verifica = mysqli_query($conn, "SELECT * FROM login WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");

    $rowcount = mysqli_num_rows($verifica);
   
    if ($rowcount > 0) {      
        setcookie("login", $login);
        header("Location: ../pagina/menuInicial.php");
    } else {
        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/index.php'>
				<script type=\"text/javascript\">
					alert(\"Login e/ou senha incorretos.\");
				</script>
			";
        die();
    }
}
?>
        