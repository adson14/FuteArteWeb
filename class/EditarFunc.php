<?php
include_once("../class/conexao.php");
$cod_Func = mysqli_real_escape_string($conn, $_POST['cod_Func']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$idade = mysqli_real_escape_string($conn, $_POST['idade']);
$rg = mysqli_real_escape_string($conn, $_POST['rg']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
$cargo = mysqli_real_escape_string($conn, $_POST['cargo']);

$result_cursos = "UPDATE Funcionario SET nome='$nome', idade = '$idade',rg = '$rg',cpf = '$cpf',endereco = '$endereco',cargo = '$cargo' WHERE cod_Func = '$cod_Func'";

$resultado_cursos = mysqli_query($conn, $result_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body> <?php
        if (mysqli_affected_rows($conn) != 0) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarFunc.php'>
				<script type=\"text/javascript\">
					alert(\"Funcionário alterado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/listarFunc.php'>
				<script type=\"text/javascript\">
					alert(\"Funcionário não foi alterado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>