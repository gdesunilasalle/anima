
<div>
<header class="martelotte">
      <div class="container">
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Dados do usuário</h2>
  <h3 class="section-subheading sombras">Preencha corretamente os dados abaixo se desejar alterar seus dados</h3>
	<br>
<?php foreach ($dados as $dadosusuario) { ?>
<div class="card w-75">
	  <div class="card-header">
    <h5 class="text-success">Olá, <?php echo ($dadosusuario->edita_nomecompleto); ?>. O que deseja alterar? </h5>
  </div>
  <div class="card-body">

   		<p align="left" class="text-secondary">
   			<?php echo form_error('dnomecompleto'); ?>
			<font class="required">Nome Completo</font></p>
   			<input type="text" class="form-control" name="edita_nomecompleto" id="edita_nomecompleto" value="<?php echo ($dadosusuario->edita_nomecompleto); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dmatricula'); ?>
			<font class="required">Matrícula</font></p>
   			<input type="text" class="form-control" name="edita_matricula" id="edita_matricula" value="<?php echo ($dadosusuario->edita_matricula); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('demail'); ?>
			<font class="required">Email</font></p>
   			<input type="text" class="form-control" name="edita_email" id="edita_email" value="<?php echo ($dadosusuario->edita_email); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dcep'); ?>
			<font class="required">CEP</font></p>
   			<input type="text" class="form-control" name="edita_cep" id="edita_cep" value="<?php echo ($dadosusuario->edita_cep); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dlogradouro'); ?>
			<font class="required">Logradouro</font></p>
   			<input type="text" class="form-control" name="edita_logradouro" id="edita_logradouro" value="<?php echo ($dadosusuario->edita_logradouro); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dnumero'); ?>
			<font class="required">Número</font></p>
   			<input type="text" class="form-control" name="edita_numero" id="edita_numero" value="<?php echo ($dadosusuario->edita_numero); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dcomplemento'); ?>
			<font class="required">Complemento</font></p>
   			<input type="text" class="form-control" name="edita_complemento" id="edita_complemento" value="<?php echo ($dadosusuario->edita_complemento); ?>" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dsenha'); ?>
			<font class="required">Senha</font></p>
   			<input type="password" class="form-control" name="edita_dsenha" id="edita_dsenha" value="" required>
   			<br>
   			<p align="left" class="text-secondary">
   			<?php echo form_error('dconfirmasenha'); ?>
			<font class="required">Confirme a senha</font></p>
   			<input type="password" class="form-control" name="edita_dconfirmasenha" id="edita_dconfirmasenha" value="" required>
   			<br>
	<a href="" class="btn btn-primary">Atualizar dados cadastrais</a>
<a href="<?php echo base_url('busca'); ?>" class="btn btn-primary">Cancelar</a>
</div>
</div>
<br>
<?php } ?>
</div>
</div>
</header>