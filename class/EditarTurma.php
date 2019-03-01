<?php
include_once("../class/conexao.php");
$cod_Turma = mysqli_real_escape_string($conn, $_POST['cod_Turma']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);

$result_turmas = "UPDATE Turma SET nome='$nome' WHERE cod_Turma = '$cod_Turma'";

$resultado_turmas = mysqli_query($conn, $result_turmas);
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
					alert(\"Turma alterada com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarTurma.php'>
				<script type=\"text/javascript\">
					alert(\"Turma não foi alterada com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>