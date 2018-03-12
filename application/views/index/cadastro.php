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
<input type="text" placeholder="Nome completo" class="form-control" name="dnomecompleto" id="dnomecompleto" value="<?php echo set_value('dnomecompleto');?>">
<br />
<?php echo form_error('demail'); ?>
<input type="text" placeholder="E-mail (apenas domínios @soulasalle.com.br e @lasalle.org.br são aceitos)" class="form-control" name="demail" id="demail" value="<?php echo set_value('demail');?>">
<br />
<?php echo form_error('dmatricula'); ?>
<input type="text" placeholder="Matrícula La Salle" class="form-control" name="dmatricula" id="dmatricula" value="<?php echo set_value('dmatricula');?>">
<br />
<?php echo form_error('dlogradouro'); ?>
<input type="text" placeholder="Logradouro" class="form-control" name="dlogradouro" id="dlogradouro" value="<?php echo set_value('dlogradouro');?>">
<br />
<?php echo form_error('dnumero'); ?>
<input type="text" placeholder="Número" class="form-control" name="dnumero" id="dnumero" value="<?php echo set_value('dnumero');?>">
<br />
<?php echo form_error('dcomplemento'); ?>
<input type="text" placeholder="Complemento" class="form-control" name="dcomplemento" id="dcomplemento" value="<?php echo set_value('dcomplemento');?>">
<br />
<?php echo form_error('dcep'); ?>
<input type="text" placeholder="CEP (somente dígitos)" class="form-control" name="dcep" id="dcep" value="<?php echo set_value('dcep');?>">
<br />
<?php echo form_error('dapelido'); ?>
<input type="text" placeholder="Apelido (username)" class="form-control" name="dapelido" id="dapelido" value="<?php echo set_value('dapelido');?>">
<br />
<?php echo form_error('dsenha'); ?>
<input type="text" placeholder="Senha" class="form-control" name="dsenha" id="dsenha">
<br />
<?php echo form_error('dconfirmasenha'); ?>
<input type="text" placeholder="Confirme a senha" class="form-control" name="dconfirmasenha" id="dconfirmasenha">
<center>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Cadastrar', 'class'=>'btn btn-primary btn-xl text-uppercase')); ?>
<?php echo form_close(); ?> <br/>
</center>