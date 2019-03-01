<?php

class JogoClass {
    private $cod_Jogo;
    private $dia;
    private $hora;
    private $FUNCIONARIO_cod_Func;
    
    function getCod_Jogo() {
        return $this->cod_Jogo;
    }

    function getDia() {
        return $this->dia;
    }

    function getHora() {
        return $this->hora;
    }

    function getFUNCIONARIO_cod_Func() {
        return $this->FUNCIONARIO_cod_Func;
    }

    function setCod_Jogo($cod_Jogo) {
        $this->cod_Jogo = $cod_Jogo;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setFUNCIONARIO_cod_Func($FUNCIONARIO_cod_Func) {
        $this->FUNCIONARIO_cod_Func = $FUNCIONARIO_cod_Func;
    }


    //Crud Básico  
    
   public function retJogo() {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $tableJogo = $objConexao->retornarDados("SELECT * FROM Jogo");
        return $tableJogo;
       
   } 
   
   public function inserirJogo($objJogo) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $dia = $objConexao->getDia();
       $hora = $objConexao->getHora ();
       $FUNCIONARIO_cod_Func = $objJogo->getFUNCIONARIO_cod_Func();
       
       $objConexao->executarComandoSQL("INSERT INTO Jogo (dia,hora,FUNCIONARIO_cod_Func) VALUES ('$dia','$hora','$FUNCIONARIO_cod_Func')");
   }
   
   
   public function editarJogo($objJogo) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $cod_Jogo = $objConexao->getCod_Jogo();
       $dia = $objConexao->getDia();
       $hora = $objConexao->getHora ();
       $FUNCIONARIO_cod_Func = $objJogo->getFUNCIONARIO_cod_Func();
       
       
       $objConexao->executarComandoSQL("UPDATE Jogo SET dia = '$dia', hora = '$hora' WHERE cod_Jogo = '$cod_Jogo'");     
   }
   
   public function excluirTurma($cod_Turma) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $objConexao->executarComandoSQL("DELETE FROM Turma WHERE cod_Turma = $cod_Turma");
   }
    
}
