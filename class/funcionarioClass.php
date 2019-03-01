<?php

class funcionarioClass {

    //put your code here


    private $cod_Func;
    private $nome;
    private $idade;
    private $rg;
    private $cpf;
    private $endereco;
    private $cargo;

    function getCod_Func() {
        return $this->cod_Func;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setCod_Func($cod_Func) {
        $this->cod_Func = $cod_Func;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    //------------------CRUD------------------------

    public function retFuncionario() {

        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");

        $tableFuncionario = $objConexao->retornarDados("SELECT * FROM Funcionario");
        return $tableFuncionario;
    }

    public function inserirFuncionario($objFuncionario) {

        require_once('ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");

        $nome = $objFuncionario->getNome();
        $idade = $objFuncionario->getIdade();
        $rg = $objFuncionario->getRg();
        $cpf = $objFuncionario->getCpf();
        $endereco = $objFuncionario->getEndereco();
        $cargo = $objFuncionario->getCargo();

        echo $objFuncionario->getNome();
        echo $objFuncionario->getIdade();
        echo $objFuncionario->getRg();
        echo $objFuncionario->getCpf();
        echo $objFuncionario->getEndereco();
        echo $objFuncionario->getCargo();

        $objConexao->executarComandoSQL("INSERT INTO Funcionario (nome,idade,rg,cpf,endereco,cargo) VALUES ('$nome',$idade,'$rg','$cpf','$endereco','$cargo')");
    }

    public function editarFuncionario($objFuncionario) {
        require_once( 'ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");


        $codFunc = $objFuncionario->getCodFunc();
        $nome = $objFuncionario->getNome();
        $idade = $objFuncionario->getIdade();
        $rg = $objFuncionario->getRg();
        $cpf = $objFuncionario->getCpf();
        $endereco = $objFuncionario->getEndereco();
        $cargo = $objFuncionario->getCargo();


        $objConexao->executarComandoSQL("UPDATE alunos SET nome='$nome',"
                . "idade='$idade',rg='$rg',cpf='$cpf',endereco='$endereco',cargo='$cargo' WHERE codFunc='codFunc'");
    }

    public function deletarFuncioanario($codFunc) {
        require_once( 'ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "bdFutArte");


        $objConexao->executarComandoSQL("DELETE FROM Funcionario WHERE codFunc = $codFunc");
    }

}
