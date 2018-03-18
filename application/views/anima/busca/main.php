
<div>
<header class="mastheadlg">
      <div class="container">
        <div class="intro-text">
   		</div>
<br><br><br><br><br><br>
<center>


	<!--COLOCAR O EFEITO LEGAL NESTE TITULO DA PAGINA!! -->
  <h2 class="section-heading text-uppercase sombras">Buscar Carona</h2>
  <h3 class="section-subheading sombras">O que está Rolando... Anima?!</h3>
	<!--COLOCAR O EFEITO LEGAL NESTE TITULO DA PAGINA!! -->


	<br>

<?php foreach ($caronas as $info) { ?>
<div class="card w-75">
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
<?php
if(($this->session->userdata('email')) == ($info->emailusuario))
{
	echo '<a href="Apagacarona" class="btn btn-primary">Remover carona</a>';
}
else{echo '<a href="#" class="btn btn-primary">Animo!</a>';}
?>
</div>
</div>
<br>
<?php } ?>
</div>
</div>
</header>
