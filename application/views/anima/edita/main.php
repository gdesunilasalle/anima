
<div>
<header class="martelotte">
      <div class="container">
<center>
<section id="cadastro">
      <div class="container">
  <h2 class="section-heading text-uppercase sombras">Dados do usuário</h2>
  <h3 class="section-subheading sombras">Preencha corretamente os dados abaixo se desejar alterar seus dados</h3>
<?php foreach ($dados as $dadosusuario) { ?>
<div class="card w-95">
	  <div class="card-header">
      <?php if ($dadosusuario->fotousuario){
        echo '<img class="mx-auto rounded-circle" src="data:image/jpeg;base64,'.base64_encode($dadosusuario->fotousuario).'" height="60" width="60" class="img-thumnail">';
      }else{
        echo '<img class="mx-auto rounded-circle" src="'.base_url('img/user-icon-1.png').'" height="60" width="60" class="img-thumnail">';
      }
      ?>
      <br>
      <br>
    <h5 class="text-success">Olá, <?php echo ($dadosusuario->edita_nomecompleto); ?>. O que deseja alterar? </h5>
    <?php echo $this->session->flashdata('message');?>
  </div>
  <div class="card-body">
<?php echo form_open_multipart('alteracadastro');?>
   		<p align="left" class="text-secondary">
Foto do usuário
<br>
<input type="file" name="image" id="image" accept="image/*">
<br>
<br>
<?php echo form_error('dnomecompleto'); ?>
<font class="required">Nome Completo</font>
<input type="text" readonly placeholder="Digite aqui seu nome completo" class="form-control" name="dnomecompleto" id="dnomecompleto" oninvalid="this.setCustomValidity('Não esqueça de preencher seu nome completo!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_nomecompleto); ?>">
<br>
<font class="required">Email</font> <br>
<?php echo form_error('demail'); ?>
<input type="text" readonly placeholder="Digite aqui seu email La Salle (exemplo@soulasalle.com.br ou exemplo@lasalle.org)" class="form-control" name="demail" id="demail" oninvalid="this.setCustomValidity('Não esqueça de preencher seu email da La Salle!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_email); ?>">
<br>
<font class="required">Matrícula</font> <br>
<?php echo form_error('dmatricula'); ?>
<input type="text" readonly placeholder="Digite sua matrícula da La Salle" class="form-control" name="dmatricula" id="dmatricula" maxlength="10" oninvalid="this.setCustomValidity('Não esqueça de preencher a sua matricula da La Salle!')"
onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_matricula); ?>">
<br>
<script>
    function curso_outros(that) {
        if (that.value == "Outro") {
            document.getElementById("especifica").style.display = "block";
        } else {
            document.getElementById("especifica").style.display = "none";
        }
    }
</script>
  <font class="required">Informe seu Curso ou Cargo</font> <br>
  <select required class="form-control" name="dcurso" onchange="curso_outros(this);">
    <option selected value="<?php echo ($dadosusuario->cursousuario); ?>"><?php echo ($dadosusuario->cursousuario); ?></option>
    <option disabled>Graduação:</option>
    <option value="Administração">Administração</option>
    <option value="Arquitetura e Urbanismo">Arquitetura e Urbanismo</option>
    <option value="Ciências Contábeis">Ciências Contábeis</option>
    <option value="Direito">Direito</option>
    <option value="Engenharia Civil">Engenharia Civil</option>
    <option value="Engenharia de Produção">Engenharia de Produção</option>
    <option value="Engenharia Elétrica">Engenharia Elétrica</option>
    <option value="História">História</option>
    <option value="Pedagogia">Pedagogia</option>
    <option value="Sistemas de Informação">Sistemas de Informação</option>
    <option value="Outro">Outra(o) não especificado(a)</option>
    <option disabled>Pós-Graduação:</option>
    <option value="Direito Civil e Processual Civil">Direito Civil e Processual Civil</option>
    <option value="Docência no ensino superior: práxis educativa">Docência no ensino superior: práxis educativa</option>
    <option value="Estratégias Tributárias">Estratégias Tributárias</option>
    <option value="Gestão de negócios">Gestão de negócios</option>
    <option value="Outro">Outra(o) não especificado(a)</option>
    <option disabled>Cargos:</option>
    <option value="Professor">Professor</option>
    <option value="Outro">Funcionário (outros)</option>
  </select>
  <div id="especifica" style="display: none;">
    <p align="left" class="text-secondary"><font class="required">Especifique seu Curso ou Cargo</font><br>
    <input type="text" placeholder="Digite aqui seu Curso ou Cargo" class="form-control" value="<?php echo ($dadosusuario->especificacursousuario);?>" name="despecifica" id="despecifica" maxlength="20" size="10">
  </div>
<p align="left" class="text-secondary">
  <font class="required">CEP</font> <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm" target="_blank" ><img src="<?php echo base_url('img/cep.gif');?>"></a><br>
  <?php echo form_error('dcep'); ?>
  <input type="text" placeholder="Digite aqui o seu CEP" class="form-control" name="dcep" id="dcep" size="10" maxlength="9" onblur="pesquisacep(this.value);" oninvalid="this.setCustomValidity('Não esqueça de preencher seu CEP!')"
  onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_cep); ?>" required>
  <br>
  <font class="required">Logradouro</font> <br>
  <?php echo form_error('dlogradouro'); ?>
  <input type="text" readonly placeholder="Informe o CEP para preenchimento automático" class="form-control" name="dlogradouro" id="dlogradouro"  oninvalid="this.setCustomValidity('Informe o CEP para preenchimento automático da logradouro!')" onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_logradouro); ?>" required>
  <br>
  <font class="required">Bairro</font> <br>
  <?php echo form_error('dbairro'); ?>
  <input type="text" readonly placeholder="Informe o CEP para preenchimento automático" class="form-control" name="dbairro" id="dbairro" oninvalid="this.setCustomValidity('Informe o CEP para preenchimento automático do bairro!')" onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_bairro); ?>" required>
  <br>
  <font class="required">Cidade</font> <br>
  <?php echo form_error('dcidade'); ?>
  <input type="text" readonly placeholder="Informe o CEP para preenchimento automático" class="form-control" name="dcidade" id="dcidade" oninvalid="this.setCustomValidity('Informe o CEP para preenchimento automático da cidade!')" onchange="this.setCustomValidity('')" value="<?php echo ($dadosusuario->edita_cidade); ?>" required>
  <br>
  Complemento <br>
  <?php echo form_error('dcomplemento'); ?>
  <input type="text" readonly placeholder="Informe o CEP para preenchimento automático" class="form-control" name="dcomplemento" id="dcomplemento" value="<?php echo ($dadosusuario->edita_complemento); ?>">
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
<?php echo form_submit(array('id' => 'submit', 'value' => 'Atualizar dados', 'class'=>'btn btn-primary')); ?> <a href="<?php echo base_url('busca'); ?>" class="btn btn-primary">Cancelar</a>
</center>
<br>
<?php echo form_close(); ?> <br>
</div>
</div>
<br>
<?php
break;
} ?>
</div>
</div>
</header>
