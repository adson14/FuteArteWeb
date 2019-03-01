<?php

class AlunoClass {
    
    private $cod_Aluno;
    private $nome;
    private $idade;
    private $rg;
    private $cpf;
    private $endereco;
    private $statusMedico;
    private $FUNCIONARIO_cod_Func;
    private $TURMA_cod_Turma;
    
    function getCod_Aluno() {
        return $this->cod_Aluno;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getStatusMedico() {
        return $this->statusMedico;
    }

    function getFUNCIONARIO_cod_Func() {
        return $this->FUNCIONARIO_cod_Func;
    }

    function getTURMA_cod_Turma() {
        return $this->TURMA_cod_Turma;
    }

    function setCod_Aluno($cod_Aluno) {
        $this->cod_Aluno = $cod_Aluno;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setStatusMedico($statusMedico) {
        $this->statusMedico = $statusMedico;
    }

    function setFUNCIONARIO_cod_Func($FUNCIONARIO_cod_Func) {
        $this->FUNCIONARIO_cod_Func = $FUNCIONARIO_cod_Func;
    }

    function setTURMA_cod_Turma($TURMA_cod_Turma) {
        $this->TURMA_cod_Turma = $TURMA_cod_Turma;
    }
    
    public function retAlunos($objAluno) {
        
    }
    
    public function retAluno(){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
        
        $tableAlunos = $objConexao->retornarDados("SELECT * FROM Aluno");
        return $tableAlunos;
    }


    public function inserirAlunos($objAluno){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
    
        $nome = $objAluno->getNome();
        $idade = $objAluno->getIdade();
        $cpf = $objAluno->getCpf();
        $rg = $objAluno->getRg();
        $endereco = $objAluno->getEndereco();
        $statusMedico = $objAluno->getStatusMedico();
        $FUNCIONARIO_cod_Func = $objAluno->getFUNCIONARIO_cod_Func();
        $TURMA_cod_Turma = $objAluno->getTURMA_cod_Turma();

        $objConexao->executarComandoSQL("INSERT INTO Aluno (nome,idade,rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)VALUES ('$nome','$idade','$rg','$cpf','$endereco','$statusMedico','$FUNCIONARIO_cod_Func','$TURMA_cod_Turma');");
    }
    
    public function editarAluno($objAluno){
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
    
        $cod_Aluno = $objAluno->getCod_Aluno();
        $nome = $objAluno->getNome();
        $idade = $objAluno->getIdade();
        $cpf = $objAluno->getCpf();
        $rg = $objAluno->getRg();
        $endereco = $objAluno->getEndereco();
        $statusMedico = $objAluno->getStatusmedico();
        $FUNCIONARIO_cod_Func = $objAluno->getFUNCIONARIO_cod_Func();
        $TURMA_cod_Turma = $objAluno->getTURMA_cod_Turma();
        
        $objConexao->executarComandoSQL("UPDATE Aluno SET nome = '$nome', idade = '$idade', rg = '$rg', cpf = '$cpf', endereco = '$endereco', statusMedico = '$statusMedico', FUNCIONARIO_cod_Func = '$FUNCIONARIO_cod_Func', TURMA_cod_Turma = '$TURMA_cod_Turma' WHERE cod_Aluno = '$cod_Aluno'");
    }
    
    public function deletarAluno($cod_Aluno) {
        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");
        
        $objConexao->executarComandoSQL("DELETE FROM Aluno WHERE cod_Aluno = '$cod_Aluno'");
    }
    
}
