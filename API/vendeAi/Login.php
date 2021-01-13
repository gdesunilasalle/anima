<?php

header('Content-type: text/html; charset=utf-8');

if ( empty($_REQUEST["login"]) || empty($_REQUEST["passwd"])) {

    $returnArray["status"] = "400";
    $returnArray["message"] = "Preencha os campos obrigatórios.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;
}

// Limpa as strings recebidas e adiciona proteção
$login = htmlentities($_REQUEST["login"]);
$passwd = htmlentities($_REQUEST["passwd"]);

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
$usuario = $access->consultaUsuario($login);

if (!$usuario) {

    // Mensagem de serviço:
    $returnArray["status"] = "403";
    $returnArray["message"] = "Usuário inexistente.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;

} else if (password_verify($passwd, $usuario["senha"])) {

    // Verifica se o usuário confirmou o email
    if ($usuario["emailVerificado"] != 1) {

        // Mensagem de serviço:
        $returnArray["status"] = "403";
        $returnArray["message"] = "Verifique seu e-mail e ative sua conta para acessar. Não deixe de verificar a sua caixa de spam!";
        
        echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
        
        return;
    
    } 

    // Mensagem de serviço:
    $returnArray["status"] = "200";
    $returnArray["message"] = "Logado com sucesso.";

    // Quando logado com sucesso podemos selecionar
    // os dadosdo BD que retornam para o app.
    // No nosso caso selecionei esses:
    $returnArray["id_usuario"] = $usuario["id_usuario"];
    $returnArray["apelido"] = $usuario["apelido"];
    $returnArray["nome"] = $usuario["nome"];
    $returnArray["cpf"] = $usuario["cpf"];
    $returnArray["email"] = $usuario["email"];
    $returnArray["telefone"] = $usuario["telefone"];
    $returnArray["bairro"] = $usuario["bairro"];
    $returnArray["cidade"] = $usuario["cidade"];
    $returnArray["estado"] = $usuario["estado"];

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;

} else {

    // Mensagem de serviço:
    $returnArray["status"] = "403";
    $returnArray["message"] = "Usuário ou senha incorreta, tente novamente.";
    
    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
    
    return;

}

$access->disconnect();

echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

?>