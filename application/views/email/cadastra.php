<!DOCTYPE html>
<html lang="br">
<body>
<div style="background-color:#660298; padding-top: 5px; padding-bottom: 5px; padding-left: 50px;">
<h3>
<a style="color:#ffcc00; font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;" href="http://www.anima.pe.hu" target="_blank">Anima?!</a>
</h3>
</div>
<div style="background-color:#f2f2f2; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;">
<?php
$username = substr($_POST['demail'], 0, strpos($_POST['demail'], '@'));
$username = str_replace(".", " ", "$username");
$username = ucwords($username);
?>
<br>
<p>Olá, <?php echo $username;?>.</p>
<p>Obrigado por fazer parte do Anima, sua conta foi criada com sucesso!</p>
<p>Clique <a style="color:#660298;" href="<?php echo base_url().'index.php/user_registration?'.'email='.$_POST['demail'].'&hash='.$hash;?>">AQUI</a> para validar o seu cadastro!</p>
<br>
<p>Este é um e-mail automático, por favor não responda. Qualquer dúvida ou problema com o seu registro, favor entrar em contato através do formulário em nosso site <a style="color:#660298;" href="www.anima.pe.hu" target="_blank">www.anima.pe.hu</a></p>
<p><i>Equipe Anima<i></p>
<br>
</div>
<div style="background-color:#660298; padding-top: 3px; padding-bottom: 3px; text-align: center;">
<a style="color:#ffcc00; font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;" href="http://www.anima.pe.hu" target="_blank">www.anima.pe.hu</a>
</div>
</body>
</html>
