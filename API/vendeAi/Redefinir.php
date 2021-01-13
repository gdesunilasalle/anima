<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

require 'classes/Email.php';
use classes\Email;

header('Content-type: text/html; charset=utf-8');

if (empty($_REQUEST["email"])) {

    $returnArray["status"] = "400";
    $returnArray["message"] = "Preencha os campos obrigatórios.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;
}

// Limpa as strings recebidas e adiciona proteção
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
$usuario = $access->consultaUsuario($email);

if (!$usuario) {

    // Mensagem de serviço:
    $returnArray["status"] = "403";
    $returnArray["message"] = "Usuário inexistente.";

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

    return;

} else {

    $senhaNova = substr(md5(mt_rand()), 0, 7);
    $senhaNovaCriptografada = password_hash($senhaNova, PASSWORD_DEFAULT);

    $redefinirSenha = $access->redefinirSenha($email, $senhaNovaCriptografada);

    if (!$redefinirSenha) {

        $returnArray["status"] = "403";
        $returnArray["message"] = "Ocorreu um erro, tente novamente.";

        echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

        return;

    }

    $enviarEmail = new Email();
    $enviarEmail->mensagem("VendeAí - Senha redefinida!","<!DOCTYPE html><html><body><h2>Senha redefinida com sucesso!</h2><p>Acesse o VendeAí utilizando o seu e-mail e a senha: <b>$senhaNova</b>. <br><br>Ao efetuar o login crie uma nova senha.</p><p><i>Atenciosamente, equipe VendeAí.<i></p></body></html>","$email","$email"
    )->enviar();

    if(!$enviarEmail->erro()){

      $returnArray["status"] = "200";
      $returnArray["message"] = "Você receberá um e-mail com a sua nova senha em alguns minutos! Verifique a sua caixa de entrada ($email).";

    } else {
      echo $enviarEmail->erro()->getMessage();
      $returnArray["status"] = "403";
      $returnArray["message"] = "Ocorreu um erro, tente novamente.";
    }

    echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);
      
    return;

} 

$access->disconnect();

echo json_encode($returnArray, JSON_UNESCAPED_UNICODE);

?>