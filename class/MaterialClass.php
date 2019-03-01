<?php

class MaterialClass {
    
    private $cod_Material;
    private $nome;
    private $FUNCIONARIO_cod_Func;
    
    
    function getCod_Material() {
        return $this->cod_Material;
    }

    function getNome() {
        return $this->nome;
    }

    function getFUNCIONARIO_cod_Func() {
        return $this->FUNCIONARIO_cod_Func;
    }

    function setCod_Material($cod_Material) {
        $this->cod_Material = $cod_Material;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFUNCIONARIO_cod_Func($FUNCIONARIO_cod_Func) {
        $this->FUNCIONARIO_cod_Func = $FUNCIONARIO_cod_Func;
    }


    
    //Crud Básico  
    
   public function retMaterial() {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $tableMaterial = $objConexao->retornarDados("SELECT * FROM Material");
        return $tableMaterial;    
   } 
   
   public function inserirMaterial($objMaterial) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $nome = $objMaterial->getNome();
       $FUNCIONARIO_cod_Func = $objMaterial->getFUNCIONARIO_cod_Func();
       
       $objConexao->executarComandoSQL("INSERT INTO Material (nome,FUNCIONARIO_cod_Func) VALUES ('$nome','$FUNCIONARIO_cod_Func')");
   }
   
   
   public function editarMaterial($objMaterial) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $cod_Material = $objMaterial-> getFUNCIONARIO_cod_Func();
       $nome = $objMaterial-> getNome();
       
       
       $objConexao->executarComandoSQL("UPDATE Material SET nome = '$nome' WHERE cod_Material = '$cod_Material'");    
   }
   
   public function excluirMaterial($cod_Material) {
       require_once('ConexaoClass.php');
       $objConexao = new ConexaoClass("localhost", "root", "", "bdfutarte");
       
       $objConexao->executarComandoSQL("DELETE FROM Material WHERE cod_Material = $cod_Material");
   }  
}
