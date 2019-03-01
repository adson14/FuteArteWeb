<?php
include_once("../class/conexao.php");
$cod_Aluno = mysqli_real_escape_string($conn, $_POST['cod_Aluno']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$idade = mysqli_real_escape_string($conn, $_POST['idade']);
$rg = mysqli_real_escape_string($conn, $_POST['rg']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
$TURMA_cod_Turma = mysqli_real_escape_string($conn, $_POST['select_Turma']);

echo $TURMA_cod_Turma;

$result_Alunos = "UPDATE Aluno SET nome='$nome', idade = '$idade',rg = '$rg',cpf = '$cpf',endereco = '$endereco', TURMA_cod_Turma = '$TURMA_cod_Turma' WHERE cod_Aluno = '$cod_Aluno'";

$resultado_Alunos = mysqli_query($conn, $result_Alunos);
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
					alert(\"Aluno alterado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/listarAluno.php'>
				<script type=\"text/javascript\">
					alert(\"Aluno não foi alterado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>