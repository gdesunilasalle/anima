<?php

header('Content-type: text/html; charset=utf-8');

// Atribuição dos posts
if (isset($_POST["titulo"])){
    $titulo = $_POST["titulo"];
}
if (isset($_POST["detalhe"])){
    $detalhe = $_POST["detalhe"];
}
if (isset($_POST["preco"])){
    $preco = $_POST["preco"];
}
if (isset($_POST["idUsuario"])){
    $idUsuario = $_POST["idUsuario"];
}

// Importa os dados para conexão ao BD
$file = parse_ini_file("../../../VendeAi.ini");

// Retira os dados da variável $file
$host = trim($file["dbhost"]);
$user = trim($file["dbuser"]);
$pass = trim($file["dbpass"]);
$name = trim($file["dbname"]);

require("classes/Anuncio.php");
require("classes/Usuario.php");

if($_POST["operacao"] == 1){

    if (//0: exibir //1: cadastrar //2: editar //3: remover
        empty($_POST["operacao"]) || 
        empty($_POST["titulo"]) || 
        empty($_POST["detalhe"]) || 
        empty($_POST["preco"]) || 
        empty($_POST["idUsuario"])) {
    
        $returnArray["status"] = "400";
        $returnArray["message"] = "Preencha os campos obrigatórios.";
    
        echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
    
        return;
    }

    // preparo do upload
    $target_dir = "uploads/";
    $target_dir = $target_dir . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_dir)) {

        $imagem = basename($_FILES["imagem"]["name"]);

        $access = new Anuncio($host, $user, $pass, $name, $imagem, $titulo, $detalhe, $preco, $idUsuario);
        $access->connect();

        $anuncioPostado = $access->cadastrarAnuncio();

        $returnArray["status"] = "200";
        $returnArray["message"] = "Anúncio postado com sucesso!";
        $access->disconnect();

        echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
        return;

    } else {
    
        $returnArray["status"] = "403";
        $returnArray["message"] = "Usuário ou senha incorreta, tente novamente.";
        $access->disconnect();

        echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
        return;
    }
}

if($_POST["operacao"] == 0){


    $access = new Anuncio($host, $user, $pass, $name, null, null, null, null, null);
    $access->connect();

    $anuncios = $access->consultarAnuncio();

    $access->disconnect();

    echo json_encode($anuncios, JSON_UNESCAPED_UNICODE);
    
    return;

}

