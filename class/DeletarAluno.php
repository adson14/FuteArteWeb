<?php
include_once("../class/conexao.php");
$cod_Aluno = mysqli_real_escape_string($conn, $_POST['cod_Aluno2']);

$result_alunos = "DELETE FROM Aluno WHERE cod_Aluno = '$cod_Aluno'";

$resultado_alunos = mysqli_query($conn, $result_alunos);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body> <?php
        if (mysqli_affected_rows($conn) != 0) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarAluno.php'>
				<script type=\"text/javascript\">
					alert(\"Aluno Deletado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarAluno.php'>
				<script type=\"text/javascript\">
					alert(\"Aluno não foi deletado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>