<?php

header('Content-type: text/html; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ( empty($_REQUEST["apelido"]) || empty($_REQUEST["nome"]) || empty($_REQUEST["cpf"]) || empty($_REQUEST["email"]) || empty($_REQUEST["telefone"]) || empty($_REQUEST["bairro"]) || empty($_REQUEST["cidade"]) || empty($_REQUEST["estado"]) || empty($_REQUEST["senha"])) {

    $returnArray["status"] = "400";
    $returnArray["message"] = "Preencha os campos obrigatórios.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;
}

// Limpa as strings recebidas e adiciona proteção
$apelido = htmlentities($_REQUEST["apelido"]);
$nome = htmlentities($_REQUEST["nome"]);
$cpf = htmlentities($_REQUEST["cpf"]);
$email = htmlentities($_REQUEST["email"]);
$telefone = htmlentities($_REQUEST["telefone"]);
$bairro = htmlentities($_REQUEST["bairro"]);
$cidade = htmlentities($_REQUEST["cidade"]);
$estado = htmlentities($_REQUEST["estado"]);
$senha = password_hash(htmlentities($_REQUEST["senha"]), PASSWORD_DEFAULT);
$token = md5(rand(0, 1000));

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

if ($access->consultaUsuario($email)){
      // Mensagem de serviço:
      $returnArray["status"] = "403";
      $returnArray["message"] = "Usuário já cadastrado, efetue o login.";
  
      echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
  
      return;
}

$cadastro = $access->cadastrarUsuario($apelido, $nome, $cpf, $email, $telefone, $bairro, $cidade, $estado, $senha, $token);

if (!$cadastro) {

    // Mensagem de serviço:
    $returnArray["status"] = "403";
    $returnArray["message"] = "Ocorreu um erro, tente novamente.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;

} else {

  $enviarEmail = new Email();
  $enviarEmail->mensagem("VendeAí - Cadastro realizado!", "<!DOCTYPE html><body><h4>Olá, $apelido.</h4><p><i>Obrigado por fazer parte do VendeAí, sua conta foi criada com sucesso!</i></p><p><b>Clique <a href='http://anima.pe.hu/API/vendeAi/Token.php?token=$token&email=$email'>AQUI</a> para confirmar o seu e-mail e validar o seu cadastro!</b></p><p><i>Atenciosamente, equipe VendeAí.<i></p></body></html>","$email","$email")->enviar();

  if(!$enviarEmail->erro()){

    $returnArray["status"] = "200";
    $returnArray["message"] = "Já já você receberá um e-mail de confirmação! Verifique a sua caixa de entrada ($email) e clique no link de validação para finalizar o seu cadastro.";

  } else {
    echo $enviarEmail->erro()->getMessage();
    $returnArray["status"] = "403";
    $returnArray["message"] = "Ocorreu um erro, tente novamente.";
  }

  $access->disconnect();

  echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
    
  return;

}

?>