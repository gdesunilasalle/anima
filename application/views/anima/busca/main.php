
<div class="container">
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Buscar Carona</h2>
  <h3 class="section-subheading sombras">O que está Rolando... Anima?!</h3>
	<br>
	<?php echo $this->session->flashdata('message');?>
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

<?php echo form_open('card'); ?>

<input type="hidden" name="dusuario" id="dusuario" value="<?php echo $info->emailusuario; ?>">
<?php
echo form_submit(array('id' => 'submit', 'value' => 'Animo!', 'class'=>'btn btn-primary'));

echo form_close();
?>

</div>
</div>
<br>
<?php } ?>
</div>
</div>
</section>
