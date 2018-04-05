
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
    <?php echo $this->session->flashdata('message');?>
  </div>
  <div class="card-body">
<?php echo form_open('alteracadastro'); ?>
   		<p align="left" class="text-secondary">
   			<?php echo form_error('dnomecompleto'); ?>
        <font class="required">Nome Completo</font>
<input type="text" placeholder="Digite aqui seu nome completo" class="form-control" name="dnomecompleto" id="dnomecompleto" oninvalid="this.setCustomValidity('Não esqueça de preencher seu nome completo!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_nomecompleto); ?>" required>
<br>
<font class="required">Email</font> <br>
<?php echo form_error('demail'); ?>
<input type="text" placeholder="Digite aqui seu email La Salle (exemplo@soulasalle.com.br ou exemplo@lasalle.org)" class="form-control" name="demail" id="demail" oninvalid="this.setCustomValidity('Não esqueça de preencher seu email da La Salle!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_email); ?>" required>
<br>
<font class="required">Matrícula</font> <br>
<?php echo form_error('dmatricula'); ?>
<input type="text" placeholder="Digite sua matrícula da La Salle" class="form-control" name="dmatricula" id="dmatricula" maxlength="10" size="10" oninvalid="this.setCustomValidity('Não esqueça de preencher a sua matricula da La Salle!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_matricula); ?>" required>
<br>
<font class="required">CEP</font> <br>
<?php echo form_error('dcep'); ?>
<input type="text" placeholder="Digite aqui o seu CEP" class="form-control" name="dcep" id="dcep" size="10" maxlength="9" onblur="pesquisacep(this.value);" oninvalid="this.setCustomValidity('Não esqueça de preencher seu CEP!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_cep); ?>" required>
<br>
<font class="required">Logradouro</font> <br>
<?php echo form_error('dlogradouro'); ?>
<input type="text" placeholder="Digite aqui o Logradouro" class="form-control" name="dlogradouro" id="dlogradouro"  oninvalid="this.setCustomValidity('Não esqueça de preencher o Logradouro!')" onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_logradouro); ?>" required>
<br />
<font class="required">Número</font> <br>
<?php echo form_error('dnumero'); ?>
<input type="text" placeholder="Digite aqui o número" class="form-control" name="dnumero" id="dnumero" oninvalid="this.setCustomValidity('Não esqueça de preencher o número!')" onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_numero); ?>" required>
<br>
Complemento <br>
<?php echo form_error('dcomplemento'); ?>
<input type="text" placeholder="Digite aqui o complemento" class="form-control" name="dcomplemento" id="dcomplemento" value="<?php echo ($dadosusuario->edita_complemento); ?>">
<br>
<font class="required">Senha</font> <br>
<?php echo form_error('dsenha'); ?>
<input pattern=".{8,30}" type="password" placeholder="Digite sua senha entre 8 e 30 caracteres" oninvalid="this.setCustomValidity('Não esqueça de preencher sua senha (Entre 8 e 30 caracteres)!')" onchange="this.setCustomValidity('')" class="form-control" name="dsenha" id="dsenha" required>
<br>
<font class="required">Confirme a senha</font> <br>
<?php echo form_error('dconfirmasenha'); ?>
<input pattern=".{8,30}" type="password" placeholder="Confirme aqui sua senha" class="form-control" name="dconfirmasenha" oninvalid="this.setCustomValidity('Não esqueça de preencher a confirmação de senha (Entre 8 e 30 caracteres)!')" onchange="this.setCustomValidity('')" id="dconfirmasenha" required>
<br>
<center>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Atualizar dados', 'class'=>'btn btn-primary text-uppercase')); ?> <a href="<?php echo base_url('busca'); ?>" class="btn btn-primary">Cancelar</a>
</center>
<br>
<?php echo form_close(); ?> <br>
</div>
</div>
<br>
<?php } ?>
</div>
</div>
</header>