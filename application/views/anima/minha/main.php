<div>
<header class="martelotte">
      <div class="container">
<center>
<section id="cadastro">
      <div class="container">
<?php if (!$caronas){echo '<h3 class="section-heading text-uppercase sombras">Carona oferecida por mim</h3><h3 class="section-subheading sombras">Você não possui nenhuma oferta ativa de carona no momento</h3>';}?>	
<?php foreach ($caronas as $info) { ?>
<h3 class="section-heading text-uppercase sombras">Carona oferecida por mim</h3>
<h3 class="section-subheading sombras">Aqui você pode editar a carona, removê-la ou conversar com seus colegas pelo chat</h3>
<?php echo $this->session->flashdata('message');?>
<div class="card w-100">
	  <div class="card-header">
    <h5 class="text-success"><?php echo $info->emailusuario; ?></h5>
  </div>
  <div class="card-body">

   		<p class="text-secondary">
			<?php echo $info->origemusuario; ?>
			<br>
			<?php echo $info->destinousuario; ?>
			<br>
			<?php echo $info->horariousuario; ?>
			<br>
			<?php echo $info->meio; ?></p>

<?php echo form_open('card'); ?>
<input type="hidden" name="dusuario" id="dusuario" value="<?php echo $info->emailusuario; ?>">
<?php
if(($this->session->userdata('email')) == ($info->emailusuario))
{
	echo 
	form_submit(array('id' => 'submit', 'value' => 'Ver detalhes', 'class'=>'btn btn-primary')).
	'<a href="oferece" class="btn btn-primary">Alterar carona</a>
           <a class="btn btn-primary" data-toggle="modal" href="#alertaModal1">
           <div class="comofunciona-hover">
           <div class="comofunciona-hover-content">      
           </div>
           </div>
           Apagar carona
           </a>';
}

//ADICIONAR BOTÃO DE CHAT

else{echo form_submit(array('id' => 'submit', 'value' => 'Animo!', 'class'=>'btn btn-primary'));
}
echo form_close();
?>
</div>
</div>
<br>
<?php } ?>
<?php if (!$passageiro){echo '<h3 class="section-heading text-uppercase sombras">Caronas onde sou passageiro</h3><h3 class="section-subheading sombras">Você não possui nenhuma carona ativa no momento</h3>';}?>
<?php foreach ($passageiro as $info) { ?>
<h3 class="section-heading text-uppercase sombras">Carona onde sou passageiro</h3>
<h3 class="section-subheading sombras">Aqui você sair da carona ou conversar com seus colegas pelo chat</h3>
<?php echo $this->session->flashdata('message');?>
<div class="card w-100">
	  <div class="card-header">
    <h5 class="text-success"><?php echo $info->emailusuario; ?></h5>
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			<?php echo $info->origemusuario; ?>
			<br>
			<?php echo $info->destinousuario; ?>
			<br>
			<?php echo $info->horariousuario; ?>
			<br>
			<?php echo $info->meio; ?></p>

<?php echo form_open('card'); ?>
<input type="hidden" name="dusuario" id="dusuario" value="<?php echo $info->emailusuario; ?>">
<?php

// alterar tudo para o formato correto de interagir com carona onde sou pasasageiro

if(($this->session->userdata('email')) == ($info->emailusuario))
{
	echo '<a href="Apagacarona" class="btn btn-primary">Remover carona</a> <a href="oferece" class="btn btn-primary">Alterar carona</a>';
}

//ADICIONAR BOTÃO DE CHAT

else{echo form_submit(array('id' => 'submit', 'value' => 'Ver detalhes', 'class'=>'btn btn-primary'));
}
echo form_close();
?>
</div>
</div>
<?php } ?>
</div>
</div>
</header>
