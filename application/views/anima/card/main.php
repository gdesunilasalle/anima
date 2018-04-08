<div>
<header class="martelotte">
<div class="container">
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Detalhes da carona</h2>
  <h3 class="section-subheading sombras">E então... Anima?!</h3>
<?php foreach ($caronas as $info) {?>
<div class="card w-100">
	  <div class="card-header">
    <h5 class="text-success"><?php echo $info->emailusuario; ?></h5>
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			<b>O trajeto da carona é <?php echo $info->origemusuario; ?> - <?php echo $info->destinousuario; ?>, hoje <?php echo $info->horariousuario; ?>h
			<br>
			Meio de transporte: <?php echo $info->meio; ?></p></b>
			<p class="text-secondary" align="left">
			Usuários confirmados:
			<br>
<?php if (!$confirmados){echo 'Não há usuários confirmados nesta carona<br>';


if ($info->emailusuario == $this->session->userdata('email')){

//INÍCIO DE EXIBIÇÃO DO CHAT
foreach ($chat as $infochat) {
			
			echo '<div class="form-group">
  	<textarea readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 
			echo $infochat->horachat;
			echo ' '; 
			if ($infochat->hostchat){
			echo $infochat->hostchat;}
			echo ' ';
			if ($infochat->passageirochat){
			echo $infochat->passageirochat;}
			echo ' ';
			echo $infochat->mensagemchat;
			echo '</textarea></div>';
			}
//FIM DE EXIBIÇÃO DO CHAT

  echo '<center><a href="#" class="btn btn-primary">Enviar mensagem</a> <a href="Apagacarona" class="btn btn-primary">Remover carona</a> <a href="oferece" class="btn btn-primary">Alterar carona</a></center>';
}

echo form_open('adere'); ?>
<input type="hidden" name="dproponente" id="dproponente" value="<?php echo $info->emailusuario; ?>">
<?php
if ($info->emailusuario != $this->session->userdata('email')){
	echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';}

      }else{

			foreach ($confirmados as $infoconfirmados) {?>
			<?php
			echo $infoconfirmados->emailusuario; ?>
			<br>
			<?php } ?>
			</p>
<?php echo form_open('adere'); ?>
<input type="hidden" name="dproponente" id="dproponente" value="<?php echo $info->emailusuario; ?>">
<?php
if(($this->session->userdata('email')) == ($infoconfirmados->emailusuario))
{

//INÍCIO DE EXIBIÇÃO DO CHAT
foreach ($chat as $infochat) {
			
			echo '<div class="form-group">
  	<textarea readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 
			echo $infochat->horachat;
			echo ' '; 
			if ($infochat->hostchat){
			echo $infochat->hostchat;}
			echo ' ';
			if ($infochat->passageirochat){
			echo $infochat->passageirochat;}
			echo ' ';
			echo $infochat->mensagemchat;
			echo '</textarea></div>';
			}
//FIM DE EXIBIÇÃO DO CHAT

	echo '<div class="alert alert-success" role="alert"><strong>Você já está dentro dessa carona! </strong>Aqui você pode acessar o chat ou sair da carona.</div><br><a href="#" class="btn btn-primary">Enviar mensagem</a> <a href="apagacarona/sairdacarona/'."$info->emailusuario".'" class="btn btn-primary">Sair da carona</a> <a href="busca" class="btn btn-primary">Voltar para busca</a>';
}
else{

	echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';}
?>
</form>
</div>
</div>
<br>
<?php }} ?>
</div>
</div>
</header>
