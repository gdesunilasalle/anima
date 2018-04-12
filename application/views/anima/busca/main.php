<header class="martelotte">
<div class="container">  
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Buscar Carona</h2>
  <h3 class="section-subheading sombras">O que está Rolando... Anima?!</h3>
	<br>
	<?php echo $this->session->flashdata('message');?>
	<?php
	if(!$caronas){
		echo '<h3 class="section-subheading sombras">Nenhuma oferda de carona disponível no momento...</h3><br><br><br><br><br><br><br><br>';
	}else{
foreach ($caronas as $info) {

echo '<div class="card w-100">
	  <div class="card-header">
    <h5 class="text-success">'.$info->emailusuario.'</h5>
  </div>
  <div class="card-body">

   		<p class="text-secondary">
			'.$info->origemusuario.'</p>
			<p class="text-secondary">
			'.$info->destinousuario.'</p>
			<p class="text-secondary">
			'.$info->horariousuario.'</p>
			<p class="text-secondary">
			'.$info->meio.'</p>'
.form_open('card').'
<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => 'Animo!', 'class'=>'btn btn-primary')).form_close().'
</div>
</div>
';
}
}
?>
</div>
</div>
</header>
</section>

