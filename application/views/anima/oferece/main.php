<section id="cadastro">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Oferecer carona</h2>
            <h3 class="section-subheading text-muted">Preencha corretamente os dados abaixo:</h3>
          </div>
        </div>
<?php echo form_open('oferece/grava'); ?>
<CENTER>
<!-- INICIO DOS CAMPOS DO FORMULÁRIO -->
<center>
<input id="dusuario" name="dusuario" type="hidden" value="<?php print_r($this->session->userdata('email'));?>">
<font class="required">Meio</font>
<br>
<select name="dmeiotransporte">
    <option value="A pé">A pé</option>
    <option value="Carro">Carro</option>
    <option value="Ônibus">Ônibus</option>
    <option value="Uber">Uber</option>
    <option value="Bicicleta">Bicicleta</option>
    <option value="Táxi">Táxi</option>
  </select>
  <br>
  <font class="required">Origem</font>
  <br>
  <select name="dorigem">
    <option value="Casa">Casa</option>
    <option value="Unilasalle">Unilasalle</option>
    <option value="Terminal">Terminal</option>
    <option value="Rodoviária">Rodoviária</option>
    <option value="Barcas">Barcas</option>
  </select>
  <br>
  <font class="required">Destino</font>
  <br>
  <select name="ddestino">
    <option value="Unilasalle">Unilasalle</option>
    <option value="Casa">Casa</option>
    <option value="Terminal">Terminal</option>
    <option value="Rodoviária">Rodoviária</option>
    <option value="Barcas">Barcas</option>
  </select>
 <br>
  <font class="required">Horário</font>
  <br>
  <select name="dhorario">
	<?php
	date_default_timezone_set("Europe/London");
	$range=range(strtotime("5:00"),strtotime("23:00"),30*60);
	foreach($range as $time){
    echo '<option value="'. date("H:i",$time).'">'. date("H:i",$time).'</option>'. date("H:i",$time)."\n";
	}?>
</select>
<br>
<br>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Salvar proposta', 'class'=>'btn btn-primary btn-xl text-uppercase')); ?>
<br>
<?php echo form_close(); ?>
<br>
</center>
