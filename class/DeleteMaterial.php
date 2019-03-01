<?php
include_once("../class/conexao.php");
$cod_Material = mysqli_real_escape_string($conn, $_POST['cod_Material2']);

$result_Material = "DELETE FROM Material WHERE cod_Material = '$cod_Material'";

$resultado_Material = mysqli_query($conn, $result_Material);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body> <?php
        if (mysqli_affected_rows($conn) != 0) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarMaterial.php'>
				<script type=\"text/javascript\">
					alert(\"Material Deletado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarMaterial.php'>
				<script type=\"text/javascript\">
					alert(\"Material não foi deletado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>