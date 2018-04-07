<section id="contato">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading-text-uppercase">Envie suas dúvidas, críticas ou sugestões!</h2>
            <h3 class="section-subheading">Entraremos em contato o mais rápido possível</h3>
            <?php echo $this->session->flashdata('message');?>
          </div>
        </div>
        <?php echo form_open('contato/grava'); ?>
        <div class="row">
          <div class="col-lg-12">
            <form id="contatoForm" name="envie sua mensagem" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <font class="required">Nome</font> <br>
                    <input class="form-control" id="nome" name="nome" type="text" placeholder="Digite aqui o seu nome" required data-validation-required-message="Entre com seu nome.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <font class="required">Email</font> <br>
                    <input class="form-control" id="email" name="email" type="email" placeholder="Digite aqui seu email" required data-validation-required-message="Entre com seu endereço de email.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <font class="required">Telefone</font> <br>
                    <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Digite aqui seu telefone com DDD e código de país" required data-validation-required-message="Entre com seu telefone.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <font class="required">Mensagem</font> <br>
                    <textarea class="form-control" id="mensagem" name="mensagem" style="margin-top: 0px; margin-bottom: 0px; height: 196px;" placeholder="Digite aqui a mensagem a ser enviada" required data-validation-required-message="Entre com a mensagem."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <?php echo form_submit(array('id' => 'submit', 'value' => 'Enviar!', 'class'=>'btn btn-primary text-uppercase')); ?>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
