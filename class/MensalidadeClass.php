<?php

class MensalidadeClass {
    private $cod_Mensalidade;
    private $valor;
    private $dataEmisao;
    private $dataVencimento;
    private $descricao;
    private $codigoBarras;
    private $ALUNO_cod_Aluno;
    private $FUNCIONARIO_cod_Func;
    
    function getALUNO_cod_Aluno() {
        return $this->ALUNO_cod_Aluno;
    }

    function setALUNO_cod_Aluno($ALUNO_cod_Aluno) {
        $this->ALUNO_cod_Aluno = $ALUNO_cod_Aluno;
    }

        function getCod_Mensalidade() {
        return $this->cod_Mensalidade;
    }

    function getValor() {
        return $this->valor;
    }

    function getDataEmisao() {
        return $this->dataEmisao;
    }

    function getDataVencimento() {
        return $this->dataVencimento;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCodigoBarras() {
        return $this->codigoBarras;
    }

    function getFUNCIONARIO_cod_Func() {
        return $this->FUNCIONARIO_cod_Func;
    }

    function setCod_Mensalidade($cod_Mensalidade) {
        $this->cod_Mensalidade = $cod_Mensalidade;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDataEmisao($dataEmisao) {
        $this->dataEmisao = $dataEmisao;
    }

    function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCodigoBarras($codigoBarras) {
        $this->codigoBarras = $codigoBarras;
    }

    function setFUNCIONARIO_cod_Func($FUNCIONARIO_cod_Func) {
        $this->FUNCIONARIO_cod_Func = $FUNCIONARIO_cod_Func;
    }


      //Crud Básico  
    
   public function retMensalidade() {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $tableMensalidade = $objConexao->retornarDados("SELECT * FROM Mensalidade");
        return $tableMensalidade;    
   } 
   
   public function inserirMensalidade($objMensalidade) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $valor = $objMensalidade->getValor();
       $dataEmisao = $objMensalidade->getDataEmisao();
       $dataVencimento = $objMensalidade->getDataVencimento();
       $descricao = $objMensalidade->getDescricao();
       $codigoBarras = $objMensalidade->getCodigoBarras();
       $ALUNO_cod_Aluno = $objMensalidade->getALUNO_cod_Aluno();
       $FUNCIONARIO_cod_Func = $objMensalidade->getFUNCIONARIO_cod_Func();
       
       $objConexao->executarComandoSQL("INSERT INTO Mensalidade (valor,dataEmisao,dataVencimento,descricao,codigobarras,FUNCIONARIO_cod_Func,ALUNO_cod_Aluno)"
               . "VALUES ('$valor','$dataEmisao','$dataVencimento','$descricao','$codigoBarras','$FUNCIONARIO_cod_Func','$ALUNO_cod_Aluno')");
   }
   
   
   public function editarMensalidade($objMensalidade) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $cod_Mensalidade = $objMensalidade->getCod_Mensalidade();
       $valor = $objMensalidade->getValor();
       $dataEmisao = $objMensalidade->getDataEmisao();
       $dataVencimento = $objMensalidade -> getDataVencimento();
       $descricao = $objMensalidade -> getDescricao();
       $codigoBarras = $objMensalidade -> getCodigoBarras();
       $FUNCIONARIO_cod_Func = $objMensalidade->getFUNCIONARIO_cod_Func();
       
       
       $objConexao->executarComandoSQL("UPDATE Mensalidade SET valor = '$valor', dataEmisao = '$dataEmisao', dataVencimento = '$dataVencimento'"
               . " descricao = '$descricao', codigoBarras = '$codigoBarras' WHERE cod_Mensalidade = '$cod_Mensalidade'");
   }
   
   public function excluirMensalidade($cod_Mensalidade) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $objConexao->executarComandoSQL("DELETE FROM Mensalidade WHERE cod_Mensalidade = $cod_Mensalidade");
   }
}
