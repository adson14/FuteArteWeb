<?php

class Turma {
    private $cod_Turma;
    private $nome;
    private $FUNCIONARIO_cod_Func;
    
    
    function getCod_Turma() {
        return $this->cod_Turma;
    }

    function getNome() {
        return $this->nome;
    }

    function getFUNCIONARIO_cod_Func() {
        return $this->FUNCIONARIO_cod_Func;
    }

    function setCod_Turma($cod_Turma) {
        $this->cod_Turma = $cod_Turma;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFUNCIONARIO_cod_Func($FUNCIONARIO_cod_Func) {
        $this->FUNCIONARIO_cod_Func = $FUNCIONARIO_cod_Func;
    }


   //Crud Básico  
    
   public function retTurmas() {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $tableTurmas = $objConexao->retornarDados("SELECT * FROM Turmas");
        return $tableTurmas;
       
   } 
   
   public function inserirTurma($objTurma) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $nome = $objTurma->getNome();
       $FUNCIONARIO_cod_Func = $objTurma->getFUNCIONARIO_cod_Func();
       
       $objConexao->executarComandoSQL("INSERT INTO Turma (nome,FUNCIONARIO_cod_Func) VALUES ('$nome','$FUNCIONARIO_cod_Func')");
   }
   
   
   public function editarTurma($objTurma) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $cod_Turma = $objTurma-> getCod_Turma();
       $nome = $objTurma-> getNome();
       
       
       $objConexao->executarComandoSQL("UPDATE Turma SET nome = '$nome' WHERE cod_Turma = '$cod_Turma'");
       
   }
   
   public function excluirTurma($cod_Turma) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $objConexao->executarComandoSQL("DELETE FROM Turma WHERE cod_Turma = $cod_Turma");
   }
}


