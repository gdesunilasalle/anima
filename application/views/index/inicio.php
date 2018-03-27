<header class="masthead">
        <div class="intro-text"  id="inicio">
          <div class="intro-lead-in sombras">Seja muito bem vindo ao Anima!</div>
          <div class="intro-heading text-uppercase sombras">JÁ É CADASTRADO?<br>
          </div>
          <?php echo $this->session->flashdata('message');?>
          <?php if(isset($e)){ echo $e->getMessage();}?>
          <?php echo form_open('usuarios');?>
<form action="<?=base_url()?>" method="post">
     <center>
            <div class="form-group col-lg-3">
                <input style="text-align: center;" class="form-control" type="text" name="txt-user" placeholder="Email La Salle">
            </div>
            <div class="col-lg-3">
                <input style="text-align: center;" class="form-control col-xs-1" type="password" name="txt-senha" placeholder="Senha">
            </div>
<br>
    <div class="g-recaptcha" data-sitekey="6Ld0pkwUAAAAAPoc-WBI4SQmUu6dKz6eJIeUtJn8"></div>
          <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=pt">
					</script>
</form>
          <br>
           <button class="btn btn-primary btn-xl text-uppercase js-scroll-trigger">Entrar</button>
          <?php echo form_close(); ?>
        </div>
      </center>
    </header>