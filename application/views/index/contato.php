<section id="contato">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Envie suas dúvidas, críticas ou sugestões por e-mail.</h2>
            <h3 class="section-subheading text-muted">Entraremos em contato mais rápido possível</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contatoForm" name="envie sua mensagem" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Nome *" required data-validation-required-message="Entre com seu nome.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="E-mail *" required data-validation-required-message="Entre com seu endereço de email.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Telefone *" required data-validation-required-message="Entre com seu telefone.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">

                    <textarea class="form-control" id="message" style="margin-top: 0px; margin-bottom: 0px; height: 146px;" placeholder="Mensagem *" required data-validation-required-message="Entre com a mensagem."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
