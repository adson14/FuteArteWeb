<?php
include_once("../class/conexao.php");
$cod_Turma = mysqli_real_escape_string($conn, $_POST['cod_Turma2']);

$result_turma = "DELETE FROM Turma WHERE cod_Turma = '$cod_Turma'";

$resultado_turma = mysqli_query($conn, $result_turma);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body> <?php
        if (mysqli_affected_rows($conn) != 0) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarTurma.php'>
				<script type=\"text/javascript\">
					alert(\"Turma Deletada com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarTurma.php'>
				<script type=\"text/javascript\">
					alert(\"Turma não foi deletada com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>