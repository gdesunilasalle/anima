<header class="martelotte" id="wrap">
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
		echo '<h3 class="section-subheading sombras">Nenhuma oferta de carona disponível no momento...</h3><br><br><br><br><br><br><br><br>';
	}else{
foreach ($caronas as $info) {

  		$username = substr($info->emailusuario, 0, strpos($info->emailusuario, '@'));
  		$username = str_replace(".", " ", "$username");
  		$username = ucwords($username);

  		echo '<div class="card w-100">
  			  <div class="card-header">
  		    <h5 class="text-success">'.$username.'</h5>
    <p class="text-secondary"><i>'.$info->cursousuario;
    if($info->especificacursousuario){echo ' - '.$info->especificacursousuario;}
    echo '</i></p>
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			'.$info->origemusuario.'</p>
			<p class="text-secondary">
			'.$info->destinousuario.'</p>
      <p>
      <a class="btn btn-outline-success" target="_blank" href="https://www.google.com/maps/dir/'.$info->origemusuario.'/'.$info->destinousuario.'">Visualizar rota</a>
      </p>
			<p class="text-secondary">Hoje -
			'.$info->horariousuario.'h</p>
			<p class="text-secondary">
			'.$info->meio.'</p>'
.form_open('card').'
<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => 'Animo!', 'class'=>'btn btn-primary')).form_close().'
</div>
</div>
<br>

';
}
}
?>
</div>
</div>
<div class="py-0 text-secundary" style="width: 100%; background-color:#660298;">
&nbsp;
</div>
</header>
</section>

<!-- INÍCIO DO RODAPÉ -->
<!--<div class="copyright  intro-lead-in sombras text-white" style="background-color:#660298"> -->


</body>
<script src="<?php echo base_url('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- Plugin JavaScript -->
<script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<!-- Contato form JavaScript -->
<script src="<?php echo base_url('js/jqBootstrapValidation.js'); ?>"></script>
<script src="<?php echo base_url('js/contato_me.js'); ?>"></script>
<!-- Custom scripts for this template -->
<script src="<?php echo base_url('js/agency.min.js'); ?>"></script>
</html>
