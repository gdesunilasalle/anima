<?php

header('Content-type: text/html; charset=utf-8');

class Usuario {

    //Construtores e conexão com BD
    var $host = null;
    var $user = null;
    var $pass = null;
    var $name = null;
    var $conn = null;
    var $result = null;

    function __construct($dbhost, $dbuser, $dbpass, $dbname) {

        $this->host = $dbhost;
        $this->user = $dbuser;
        $this->pass = $dbpass;
        $this->name = $dbname;

    }

    public function connect() {

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if (mysqli_connect_errno()) {
            echo "Não foi possível conectar ao banco de dados.";
        }

        $this->conn->set_charset("utf8");
    }

    public function disconnect() {

        if ($this->conn) {
            $this->conn->close();
        }
    }

    // Login
    public function consultaUsuario($email) {

        $returnArray = array();

        $sql = "SELECT * FROM usuario WHERE email='".$email."'";

        $result = $this->conn->query($sql);

        if ($result != null && (mysqli_num_rows($result) >= 1)) {

            $row = $result->fetch_array(MYSQLI_ASSOC);

            if (!empty($row)) {
                $returnArray = $row;
            }
        }

        return $returnArray;

    }

    // Cadastrar usuario
    public function cadastrarUsuario($apelido, $nome, $cpf, $email, $telefone, $bairro, $cidade, $estado, $senha, $token) {

        $sql = "SELECT * FROM usuario WHERE email='".$email."'";

        $result = $this->conn->query($sql);

        if ($result != null && (mysqli_num_rows($result) >= 1)) {

        return;

        }

        // comando sql
        $sql = "INSERT INTO usuario SET apelido = '".$apelido."', nome = '".$nome."', cpf = '".$cpf."', email = '".$email."', telefone = '".$telefone."', bairro = '".$bairro."', cidade = '".$cidade."', estado = '".$estado."', senha = '".$senha."', hash = '".$token."'";

        // guarda resultado da query em $statement
        $statement = $this->conn->prepare($sql);

        if (!$statement) {
            throw new Exception($statement->error);
        }

        $returnValue = $statement->execute();

        return $returnValue;

    }

    function confirmaToken($token, $email) {

        $sql = "SELECT * FROM usuario WHERE email='".$email."' AND hash = '".$token."'";

        $result = $this->conn->query($sql);

        if ($result == null || (mysqli_num_rows($result) == 0)) {

            echo "Ocorreu um erro. ";
            return;

        } else {

            $sql = "UPDATE usuario SET emailVerificado = 1 WHERE email='".$email."' AND hash = '".$token."'";
            $statement = $this->conn->prepare($sql);

            if (!$statement) {
                throw new Exception($statement->error);
            }

            $returnValue = $statement->execute();

            return $returnValue;

        }

    }

        // Redefinir senha
        public function redefinirSenha($email, $senhaNovaCriptografada) {

            $sql = "UPDATE usuario SET senha = '".$senhaNovaCriptografada."' WHERE email = '".$email."'";
    
            // guarda resultado da query em $statement
            $statement = $this->conn->prepare($sql);

            if (!$statement) {
                throw new Exception($statement->error);
                return;
            }

            $returnValue = $statement->execute();
    
            return $returnValue;
    
        }

}