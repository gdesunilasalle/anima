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
<p>Olá <?php echo $username;?>!</p>
<p>Seus dados foram alterados com sucesso, obrigado por usar o Anima!</p>
<br>
<p><i>Equipe Anima<i></p>
<br>
</div>
<div style="background-color:#660298; padding-top: 3px; padding-bottom: 3px; text-align: center;">
<a style="color:#ffcc00; font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;" href="http://www.anima.pe.hu" target="_blank">www.anima.pe.hu</a>
</div>
</body>
</html>
