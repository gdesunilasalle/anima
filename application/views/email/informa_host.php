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
$data= $this->session->userdata('email');
$username = substr($data, 0, strpos($data, '@'));
$username = str_replace(".", " ", "$username");
$username = ucwords($username);
?>
<br>
<p>Opa! Percebemos que alguém se Animou com a sua carona!</p>
<p>Que tal ir até lá e dar um alô para  <b><?php echo $username;?></b>? Basta clicar <a style="color:#660298; font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;" href="http://www.anima.pe.hu" target="_blank">aqui!</a></p>
<br>
<p><i>Equipe Anima<i></p>
<br>
</div>
<div style="background-color:#660298; padding-top: 3px; padding-bottom: 3px; text-align: center;">
<a style="color:#ffcc00; font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;" href="http://www.anima.pe.hu" target="_blank">www.anima.pe.hu</a>
</div>
</body>
</html>
