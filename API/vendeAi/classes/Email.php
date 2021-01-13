<?php

namespace classes;

use stdClass;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config/Email.php';

class Email {

    /** @var PHPMailer */
    private $mail;

    /** @var stdClass */
    private $data;
    
    /** @var Exception */
    private $error;

    public function __construct(){

        $this->mail = new PHPMailer(true);
        $this->data = new stdClass();

        $this->mail->IsHTML(true);
        $this->mail->SMTPDebug = 2;

        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->CharSet = "utf-8";
        $this->mail->setFrom(CONF_SMTP_MAIL["user"], CONF_SMTP_MAIL["from_name"]);
        $this->mail->addReplyTo(CONF_SMTP_MAIL["user"], CONF_SMTP_MAIL["from_name"]);

        $this->mail->Host = CONF_SMTP_MAIL["host"];
        $this->mail->Port = CONF_SMTP_MAIL["port"];
        $this->mail->Username = CONF_SMTP_MAIL["user"];
        $this->mail->Password = CONF_SMTP_MAIL["password"];
        
    }

    public function mensagem(string $subject, string $body, string $recipient_name, string $recipient_email): Email {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipient_name = $recipient_name;
        $this->data->recipient_email = $recipient_email;

        return $this;

    }

    public function anexo(string $filePath, string $fileName): Email {

        $this->data->anexo[$filePath] = $fileName;

        return $this;

    }

    public function enviar(string $from_name = CONF_SMTP_MAIL["from_name"], string $from_email = CONF_SMTP_MAIL["from_email"]): bool {

        try {

            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_name);
            $this->mail->setFrom($from_email, $from_name);
            $this->mail->AddReplyTo($from_email);
            $this->mail->isSMTP();

            if(!empty($this->data->anexo)){
                foreach($this->data->anexo as $path => $name){
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();
            return true;

        } catch(Exception $e) {
            $this->error = $e;
            return false;
        }

    }

    public function erro(): ?Exception {

        return $this->error;

    }



}