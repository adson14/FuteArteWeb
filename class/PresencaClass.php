<?php
class PresencaClass {
    private $cod_Presenca;
    private $statusPresenca;
    private $TURMA_cod_Turma;
    private $JOGO_cod_Jogo;
    
    function getCod_Presenca() {
        return $this->cod_Presenca;
    }

    function getStatusPresenca() {
        return $this->statusPresenca;
    }

    function getTURMA_cod_Turma() {
        return $this->TURMA_cod_Turma;
    }

    function getJOGO_cod_Jogo() {
        return $this->JOGO_cod_Jogo;
    }

    function setCod_Presenca($cod_Presenca) {
        $this->cod_Presenca = $cod_Presenca;
    }

    function setStatusPresenca($statusPresenca) {
        $this->statusPresenca = $statusPresenca;
    }

    function setTURMA_cod_Turma($TURMA_cod_Turma) {
        $this->TURMA_cod_Turma = $TURMA_cod_Turma;
    }

    function setJOGO_cod_Jogo($JOGO_cod_Jogo) {
        $this->JOGO_cod_Jogo = $JOGO_cod_Jogo;
    }

    public function retPresenca(){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
        
        $tabelaPresenca = $objConexao->retornarDados("SELECT * FROM Presenca");
    }
    
    public function inserirPresenca($objPresenca) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
        
        $statusPresenca = $objPresenca->getStatusPresenca();
        $TURMA_cod_Turma = $objPresenca->getTURMA_cod_Turma();
        $JOGO_cod_Jogo = $objPresenca->getJOGO_cod_Jogo();
        
        $objConexao->executarComandoSQL("INSERT INTO Presenca VALUES ('$statusPresenca','$TURMA_cod_Turma','$JOGO_cod_Jogo');");
        
    }
    
    public function editarPresenca($objPresenca) {     
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
        
        $cod_Presenca = $objPresenca->getCod_Presenca();
        $statusPresenca = $objPresenca->getStatusPresenca();
        $TURMA_cod_Turma = $objPresenca->getTURMA_cod_Turma();
        $JOGO_cod_Jogo = $objPresenca->getJOGO_cod_Jogo();
        
        $objConexao->executarComandoSQL("UPDATE Presenca SET statuPresenca = '$statusPresenca', TURMA_cod_Turma = '$TURMA_cod_Turma', JOGO_cod_Jogo = '$JOGO_cod_Jogo' WHERE cod_Presenca = '$cod_Presenca'");

    }
    
    public function deletarPresenca($cod_Presenca){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
        
        $objConexao->executarComandoSQL("DELETE FROM Presenca WHERE cod_Presenca = '$cod_Presenca'");
    }
    
}
