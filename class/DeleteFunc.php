<?php
include_once("../class/conexao.php");
$cod_Func = mysqli_real_escape_string($conn, $_POST['cod_Func2']);

$result_cursos = "DELETE FROM Funcionario WHERE cod_Func = '$cod_Func'";

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
					alert(\"Funcionario Deletado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarFunc.php'>
				<script type=\"text/javascript\">
					alert(\"Funcionario não foi deletado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>