<div>
<header class="martelotte">
<div class="container">
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Detalhes da carona</h2>
  <h3 class="section-subheading sombras">E então... Anima?!</h3>
				<!--INICIO DE EXIBE OS ALERTAS GERAIS -->
               
                <?php foreach ($passageiro as $info) { foreach ($confirmados as $infoconfirmados) { ?>

                <?php if($info->passageiro != 0 && ($this->session->userdata('email')) == ($infoconfirmados->emailusuario)){
                  echo'<div class="alert alert-success" role="alert"><strong>Você já se encontra na carona abaixo! </strong>Você pode acessar o chat ou sair da carona. O que deseja fazer?</div>';

                  }else{echo '<div class="alert alert-danger" role="alert"><strong>ATENÇÃO! </strong>Você já é passageiro de um carona ativa. Se optar por outra carona você automaticamente deixará de ser passageiro na carona ativa!<br></div>';
                } ?>
                <?php }} ?>
              <!--FIM DE EXIBE OS ALERTAS GERAIS -->
<?php foreach ($caronas as $info) {?>
<div class="card w-75">
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
echo form_open('adere'); ?>
<input type="hidden" name="dproponente" id="dproponente" value="<?php echo $info->emailusuario; ?>">
<?php
	echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';}else{
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
	echo '<a href="apagacarona/sairdacarona/'."$info->emailusuario".'" class="btn btn-primary">Sair da carona</a> <a href="#" class="btn btn-primary">Chat</a> <a href="busca" class="btn btn-primary">Voltar para busca</a>';
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
