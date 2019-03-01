<?php
include_once("../class/conexao.php");
$cod_Mensalidade = mysqli_real_escape_string($conn, $_POST['cod_Func']);
$valor = mysqli_real_escape_string($conn, $_POST['valor']);
$dataEmisao = mysqli_real_escape_string($conn, $_POST['dataEmisao']);
$dataVencimento = mysqli_real_escape_string($conn, $_POST['dataVencimento']);
$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
$codBarras = mysqli_real_escape_string($conn, $_POST['codigoBarras']);
//$FUNCIONARIO_cod_Func = mysqli_real_escape_string($conn, $_POST['select_Func']);

$result_cursos = "UPDATE Mensalidade SET valor = $valor, dataEmisao = '$dataEmisao', dataVencimento = '$dataVencimento',"
               . " descricao = '$descricao', codigoBarras = '$codBarras' WHERE cod_Mensalidade = $cod_Mensalidade";

$resultado_cursos = mysqli_query($conn, $result_cursos);

?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body> <?php
        if (mysqli_affected_rows($conn) != 0) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarMensalidade.php'>
				<script type=\"text/javascript\">
					alert(\"Curso alterado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarMensalidade.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi alterado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>
