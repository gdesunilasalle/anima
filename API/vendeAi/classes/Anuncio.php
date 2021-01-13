<?php

header('Content-type: text/html; charset=utf-8');

class Anuncio {

    var $imagem = null;
    var $titulo = null;
    var $detalhe = null;
    var $preco = null;
    var $idUsuario = null;

    //Construtores e conexão com BD
    var $host = null;
    var $user = null;
    var $pass = null;
    var $name = null;
    var $conn = null;
    var $result = null;

    function __construct($dbhost, $dbuser, $dbpass, $dbname, $imagem, $titulo, $detalhe, $preco, $idUsuario) {

        $this->host = $dbhost;
        $this->user = $dbuser;
        $this->pass = $dbpass;
        $this->name = $dbname;

        $this->imagem = $imagem;
        $this->titulo = $titulo;
        $this->detalhe = $detalhe;
        $this->preco = $preco;
        $this->idUsuario = $idUsuario;

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

    // Cadastrar anuncio
    public function cadastrarAnuncio() {
        
        // comando sql
        $sql = "INSERT INTO anuncio SET 
            imagem = '".$this->imagem."', 
        titulo = '".$this->titulo."', 
        descricao = '".$this->detalhe."', 
        preco = '".$this->preco."', 
        id_usuario = '".$this->idUsuario."'";

        // guarda resultado da query em $statement
        $statement = $this->conn->prepare($sql);

        if (!$statement) {
            throw new Exception($statement->error);
        }

        $returnValue = $statement->execute();

        return $returnValue;

    }

    // Cadastrar anuncio
    public function consultarAnuncio() {

        // comando sql
        $sql = "SELECT * FROM anuncio";

        $result = $this->conn->query($sql);

        if ($result != null && (mysqli_num_rows($result) >= 1)) {

            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $returnArray[] = $row;
            }
            
        }

        return $returnArray;

    }

}