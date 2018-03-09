<section id="cadastro">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Cadastro</h2>
            <h3 class="section-subheading text-muted">Preencha corretamente os dados abaixo:</h3>
          </div>
        </div>

<?php echo form_open('cadastro'); ?>
<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Dados cadastrados com sucesso!</h3></CENTER><br>
<?php } ?>

<!-- INICIO DOS CAMPOS DO FORMULÁRIO -->

<?php echo form_error('dnomecompleto'); ?>
<?php echo form_input(array('id' => 'dnomecompleto','placeholder' => 'Nome completo', 'name' => 'dnomecompleto', 'class'=>'form-control')); ?>

<?php echo form_error('demail'); ?><br />
<?php echo form_input(array('id' => 'demail','placeholder' => 'E-mail', 'name' => 'demail', 'class'=>'form-control')); ?>

<?php echo form_error('dmatricula'); ?><br />
<?php echo form_input(array('id' => 'dmatricula','placeholder' => 'Matrícula La Salle', 'name' => 'dmatricula', 'class'=>'form-control')); ?>

<?php echo form_error('dlogradouro'); ?><br />
<?php echo form_input(array('id' => 'dlogradouro','placeholder' => 'Logradouro', 'name' => 'dlogradouro', 'class'=>'form-control')); ?>

<?php echo form_error('dnumero'); ?><br />
<?php echo form_input(array('id' => 'dnumero','placeholder' => 'Número', 'name' => 'dnumero', 'class'=>'form-control')); ?>

<?php echo form_error('dcomplemento'); ?><br />
<?php echo form_input(array('id' => 'dcomplemento','placeholder' => 'Complemento', 'name' => 'dcomplemento', 'class'=>'form-control')); ?>

<?php echo form_error('dcep'); ?><br />
<?php echo form_input(array('id' => 'dcep','placeholder' => 'CEP (somente dígitos)', 'name' => 'dcep', 'class'=>'form-control')); ?>

<?php echo form_error('dapelido'); ?><br />
<?php echo form_input(array('id' => 'dapelido','placeholder' => 'Apelido (username)', 'name' => 'dapelido', 'class'=>'form-control')); ?>

<?php echo form_error('dsenha'); ?><br />
<?php echo form_input(array('id' => 'dsenha','placeholder' => 'Senha', 'name' => 'dsenha', 'type' => 'password', 'class'=>'form-control')); ?>

<?php echo form_error('dconfirmasenha'); ?><br />
<?php echo form_input(array('id' => 'dconfirmasenha','placeholder' => 'Confirme a senha', 'name' => 'dconfirmasenha', 'type' => 'password', 'class'=>'form-control')); ?>

<?php echo form_submit(array('id' => 'submit', 'value' => 'Cadastrar', 'class'=>'btn btn-primary btn-xl text-uppercase')); ?>
<?php echo form_close(); ?> <br/>
