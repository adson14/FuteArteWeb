<?php

include_once '../class/conexao.php';



$html = '<table>';
$html .= '<thead>';
$html .= '<tr align="center" >';
$html .= '<th>Turma</th>';
$html .= '<th align="left">Nome</th>';
$html .= '<th>Idade</th>';
$html .= '<th>Rg</th>';
$html .= '<th>CPF</th>';
$html .= '<th>Endereço</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';



$cod_Turma = mysqli_real_escape_string($conn, $_POST['cod_Turma']);
$result_Aluno = "SELECT T.cod_Turma, T.nome AS 'TurmaNome', T.FUNCIONARIO_cod_Func, A.cod_Aluno, A.nome, A.idade, A.rg, A.cpf, A.endereco, A.statusMedico, A.FUNCIONARIO_cod_Func, A.TURMA_cod_Turma FROM Turma T INNER JOIN Aluno A ON A.TURMA_cod_Turma = T.cod_Turma where T.cod_Turma = '$cod_Turma'";
$resultado_Aluno = mysqli_query($conn, $result_Aluno);



while ($row_Aluno = mysqli_fetch_assoc($resultado_Aluno)) {
    $html .= '<tr align="center"><td align="left">' . $row_Aluno['TurmaNome'] . "</td>";
    $html .= '<td align="left">' . $row_Aluno['nome'] . "</td>";
    $html .= '<td>' . $row_Aluno['idade'] . "</td>";
    $html .= '<td>' . $row_Aluno['rg'] . "</td>";
    $html .= '<td>' . $row_Aluno['cpf'] . "</td>";
    $html .= '<td>' . $row_Aluno['endereco'] . "</td>";

    $nomeTurma = $row_Aluno['TurmaNome'];
};

$html .= '</tbody>';
$html .= '</table';

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();


// Carrega seu HTML
$dompdf->load_html('
<style>
h1 {
font-family: arial, sans-serif;

}

table {
    font-family: arial, sans-serif;
    font-size: 12px;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

 th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    background-color: #dddddd;
}



tr:nth-child(even) {
    
}
</style>
<h1 style="text-align: center;">Turma ' . $nomeTurma . '</h1>
			' . $html . '
                        
		');

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
        "relatórioTurma.pdf", array(
    "Attachment" => false //Para realizar o download somente alterar para true
        )
);
?>