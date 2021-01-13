<?php

header('Content-type: text/html; charset=utf-8');

if ( empty($_REQUEST["token"]) || empty($_REQUEST["email"])) {

    $returnArray["status"] = "400";
    $returnArray["message"] = "Ocorreu um erro.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;
}

// Limpa as strings recebidas e adiciona proteção
$token = htmlentities($_REQUEST["token"]);
$email = htmlentities($_REQUEST["email"]);

// Importa os dados para conexão ao BD
$file = parse_ini_file("../../../VendeAi.ini");

// Retira os dados da variável $file
$host = trim($file["dbhost"]);
$user = trim($file["dbuser"]);
$pass = trim($file["dbpass"]);
$name = trim($file["dbname"]);

require("classes/Usuario.php");

$access = new Usuario($host, $user, $pass, $name);
$access->connect();

// Chama a função consultaUsuario, que armazena os dados 
// do usuário na respectiva variável
$confirmaToken = $access->confirmaToken($token, $email);

if (!$confirmaToken) {

    // Mensagem de serviço:
    $returnArray["status"] = "403";
    $returnArray["message"] = "Token inválido.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;

} else {

    echo("Email confirmado com sucesso!");
    
    //echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
    
    return;

}

$access->disconnect();

echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

?>