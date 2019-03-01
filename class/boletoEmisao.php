<?php

include_once '../class/conexao.php';

$cod_Aluno = mysqli_real_escape_string($conn, $_POST['cod_Aluno3']);
$result_mensalidade = "SELECT * FROM Mensalidade M INNER JOIN Aluno A ON M.ALUNO_cod_Aluno = A.cod_Aluno where A.cod_Aluno = '$cod_Aluno'";
$resultado_mensalidade = mysqli_query($conn, $result_mensalidade);


$codigo_Mensalidade = "";
$valor = "";
$dataEmisao = "";
$dataVencimento = "";
$descricao = "";
$codigoBarras = "";
$nomeAluno = "";
$cpfAluno = "";
$enderecoAluno = "";



while ($row_mensalidade = mysqli_fetch_assoc($resultado_mensalidade)) {
    
    $codigo_Mensalidade .= $row_mensalidade['cod_Mensalidade'] . "<br>";
    $valor .= $row_mensalidade ['valor'] . "<br>";
    $dataEmisao .= $row_mensalidade ['dataEmisao'] . "<br>";
    $dataVencimento .= $row_mensalidade ['dataVencimento'] . "<br>";
    $descricao .= $row_mensalidade ['descricao'] . "<br>";
    $codigoBarras .= $row_mensalidade ['codigoBarras'] . "<br>";
    $nomeAluno .= $row_mensalidade['nome'];
    $cpfAluno .=$row_mensalidade['cpf'];
    $enderecoAluno .= $row_mensalidade['endereco'];
    
};

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();


// Carrega seu HTML
$dompdf->load_html('                      
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<meta name="AUTOR" content="D2th3" />
<title>Molde Boleto Bancário</title>
<link href="../css/boleto.css" rel="stylesheet">

</head>

<body>
<div id="boleto_parceiro">
  <table style="width:750px; height:28px; border-bottom:solid; border-bottom-color:#000000; border-bottom-width:2px; border-top:solid; border-top-color:#000000; border-top-width:2px; margin-bottom: 5px;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="td_7_sb"> </td>
    <td><div class="titulo">Nosso Número</div>
      <div class="var"></div></td>
    <td class="td_7_cb"> </td>
    <td><div class="titulo">Espécie.</div>
      <div class="var">R$</div></td>
    <td class="td_7_cb"> </td>
    <td><div class="titulo">Quantidade</div>
      <div class="var"> </div></td>
    <td class="td_7_cb"> </td>
    <td><div class="titulo">Valor Documento</div>
      <div class="var">'. $valor .'</div></td>
    <td class="td_7_cb"> </td>
    <td><div class="titulo">Espécie Doc.</div>
      <div class="var">DS</div></td>
    <td class="td_7_cb"> </td>
    <td><div class="titulo">Agência / Código Cedente</div>
      <div class="var" style="text-align:right">5252/5525252-1</div></td>
    <td class="td_2"> </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb"> </td>
      <td><div class="titulo">Sacador / Avalista</div>
      <div class="var"> '.$nomeAluno.' </div></td>
      <td class="td_7_sb"> </td>
      <td valign="top" style="width:320px;"><div class="am">Autenticação Mecânica</div></td>
      <td class="td_2"> </td>
    </tr>
  </table>
</div>
<div id="boleto">
  <table border="0" cellpadding="0" cellspacing="0" id="tb_logo">
    <tr>
      <td rowspan="2" valign="bottom" style="width:150px;"><img src="../img/hsbc-logo.png" alt="Banco Real" width="150" height="40" title="Banco Real" /></td>
      <td align="center" valign="bottom" style="font-size: 9px; border:none;">Banco</td>
      <td rowspan="2" align="right" valign="bottom" style="width:6px;"></td>
      <td rowspan="2" align="right" valign="bottom" style="font-size: 15px; font-weight:bold; width:545px;"><span class="ld">'. $codigoBarras .'</span></td>
      <td rowspan="2" align="right" valign="bottom" style="width:2px;"></td>
    </tr>
    <tr>
      <td id="td_banco">356-5</td>
    </tr>
  </table>
  <br>
  <table class="tabelas" style="width:750px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb"> </td>
      <td style="width: 468px;"><div class="titulo">Local do Pagamento</div>
      <div class="var">Pagável em qualquer banco até a data de vencimento</div></td>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">Vencimento</div>
        <div class="var">'. $dataVencimento .'</div></td>
      <td class="td_2"> </td>
    </tr>
    <tr>
      <td class="td_7_sb"> </td>
      <td><div class="titulo">Cedente</div>
      <div class="var">Escolinha de esportes Fut Arte</div></td>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">Agência / Código do Cedente</div>
      <div class="var">5252/5525252-1</div></td>
      <td> </td>
    </tr>
  </table>
  <table class="tabelas" style="width:750px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb"> </td>
      <td style="width:103px;"><div class="titulo">Data de Vencimento</div>
        <div class="var">'. $dataVencimento .'</div></td>
      <td class="td_7_cb"> </td>
      <td style="width:133px;"><div class="titulo">Número Documento</div>
      <div class="var">'. $codigo_Mensalidade .'</div></td>
      <td class="td_7_cb"> </td>
      <td style="width:62px;"><div class="titulo">Espécie Doc.</div>
      <div class="var">DS</div></td>
      <td class="td_7_cb"> </td>
      <td style="width:34px;"><div class="titulo">Aceite</div>
      <div class="var">S</div></td>
      <td class="td_7_cb"> </td>
      <td style="width:103px;"><div class="titulo">Data Processamento</div>
      <div class="var">'. $dataEmisao . '</div></td>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">Nosso Número</div>
      <div class="var">5252525</div></td>
      <td class="td_2"> </td>
    </tr>
  </table>
  <table class="tabelas" style="width:750px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td class="td_7_sb"> </td>
      <td style="width:118px;"><div class="titulo">Uso Banco</div>
      <div class="var"> </div></td>
      <td class="td_7_cb"> </td>
      <td style="width:55px;"><div class="titulo">Carteira</div>
      <div class="var">20</div></td>
      <td class="td_7_cb"> </td>
      <td style="width:55px;"><div class="titulo">Espécie</div>
      <div class="var">R$</div></td>
      <td class="td_7_cb"> </td>
      <td style="width:104px;"><div class="titulo">Quantidade</div>
      <div class="var"> </div></td>
      <td class="td_7_cb"> </td>
      <td style="width:103px;"><div class="titulo">Valor</div>
      <div class="var"> </div></td>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">Valor do Documento</div>
      <div class="var">'.$valor.'</div></td>
      <td class="td_2"> </td>
    </tr>
  </table>
  <table class="tabelas" style="width:750px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="5" class="td_7_sb"> </td>
      <td rowspan="5" valign="top"><div class="titulo" style="margin-bottom:18px;">Instruções (texto de responsabilidade do Cedente)</div>
        <div class="var">Juros/Mora ao Dia : R$ 0,35 apos '.$dataVencimento.'<br />
        Multa de 2,00% apos 1 dia(s) do vencimento.</div>
      </td>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">(-) Desconto / Abatimento</div>
      <div class="var"> </div></td>
      <td class="td_2"> </td>
    </tr>
    <tr>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">(-) Outras Deduções</div>
      <div class="var"> </div></td>
      <td class="td_2"> </td>
    </tr>
    <tr>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">(+) Multa / Mora</div>
      <div class="var"> </div></td>
      <td class="td_2"> </td>
    </tr>
    <tr>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">(+) Outros Acréscimos</div>
      <div class="var"> </div></td>
      <td class="td_2"> </td>
    </tr>
    <tr>
      <td class="td_7_cb"> </td>
      <td class="direito"><div class="titulo">(=) Valor Cobrado</div>
      <div class="var"> </div></td>
      <td class="td_2"> </td>
    </tr>
  </table>
  <table class="tabelas" style="width:750px; height:65px; border-left:solid; border-left-width:2px; border-left-color:#000000;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb">  </td>
      <td valign="top"><div class="titulo">Sacado</div>
        <div class="var" style="margin-bottom:5px; height:auto">'.$nomeAluno.'<br />
        '.$enderecoAluno.'
        <div class="titulo">Sacador / Avalista</div></td>
      <td class="td_7_sb"> </td>
      <td class="direito" valign="top"><div class="titulo">CPF / CNPJ</div>
        <div class="var" style="text-align:left;">'. $cpfAluno .' </div></td>
      <td class="td_2"> </td>
    </tr>
  </table>
  <table style="width:750px; border-top:solid; border-top-width:2px; border-top-color:#000000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="td_7_sb"> </td>
      <td style="width: 417px; height:62px;"><img src="../img/codigoBarras.jpg" alt="Codigo Barras" width="450" height="50" title="Código de Barras" /></td>
      <td class="td_7_sb"> </td>
      <td valign="top"><div class="titulo" style="text-align:left;">Autenticaçao Mecânica / FICHA DE COMPENSAÇAO</div></td>
      <td class="td_2"> </td>
    </tr>
  </table>
</div>
</body>
</html>
                        
		');

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
        "mensalidade.pdf", array(
    "Attachment" => false //Para realizar o download somente alterar para true
        )
);
?>