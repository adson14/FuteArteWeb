<?php

class ConexaoClass extends MySQLi {

    public $host, $user, $password,
            $database, $connection;

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect_me();
    }

    private function connect_me() {
        $this->connection = $this->
                connect($this->host, 
                        $this->user,
                        $this->password, 
                        $this->database);
        if ($this->connect_error) {
            die($this->connect_error);
        }
    }

    public function retornarDados($comandoSQL = "") {

        $result = $this->query($comandoSQL);

        if ($this->error) {
            return $this->error;
        } else {
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$index] = $row;
                $index++;
            }
            return $data;
        }
    }

    public function executarComandoSQL($comandoSQL = "") {
        $this->query($comandoSQL);
        if ($this->error) {
            $erro = $this->error;
            return $erro;
        } else {
            return true;
        }
    }

}
