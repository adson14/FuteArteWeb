<?php
include_once("../class/conexao.php");
$cod_Material = mysqli_real_escape_string($conn, $_POST['cod_Material']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);

$result_material = "UPDATE Material SET nome='$nome' WHERE cod_Material = '$cod_Material'";

$resultado_material = mysqli_query($conn, $result_material);
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
					alert(\"Material alterado com Sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/FutArte/pagina/listarMaterial.php'>
				<script type=\"text/javascript\">
					alert(\"Material alterado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>
<?php $conn->close(); ?>