<div>
<header class="martelotte">
      <div class="container">
    
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Detalhes da carona</h2>
  <h3 class="section-subheading sombras">E então... Anima?!</h3>
	<br>
<?php foreach ($caronas as $info) { ?>
<div class="card w-75">
	  <div class="card-header">
    <h5 class="text-success"><?php echo $info->emailusuario; ?></h5>
  </div>
  <div class="card-body">

   		<p class="text-secondary">
			O trajeto da carona é <?php echo $info->origemusuario; ?> - <?php echo $info->destinousuario; ?>, hoje <?php echo $info->horariousuario; ?>h
			<br>
			Meio de transporte: <?php echo $info->meio; ?></p>





<?php
if(($this->session->userdata('email')) == ($info->emailusuario))
{
	echo '<a href="Apagacarona" class="btn btn-primary">Remover carona</a>';
}
else{echo '<a href="#" class="btn btn-primary">Estou dentro!</a>'; echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';}
?>



</form>


</div>
</div>
<br>
<?php } ?>
</div>
</div>
</header>