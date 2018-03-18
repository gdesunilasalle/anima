
<div>
<header class="mastheadlg">
      <div class="container">
        <div class="intro-text">
   		</div> 
<br><br><br><br><br><br>   
<center>
<?php foreach ($caronas as $info) { ?> 
<div class="card w-75">
  <div class="card-body">
    <h5 class="text-success"><?php echo $info->emailusuario; ?></h5>
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
	echo '<a href="#" class="btn btn-primary">Remover carona</a>';
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
   

