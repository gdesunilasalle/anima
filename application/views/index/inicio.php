<header class="masthead">
      <div class="container" id="inicio">
        <div class="intro-text">
          <div class="intro-lead-in">Seja muito bem vindo ao Anima!</div>
          <div class="intro-heading text-uppercase">JÁ É CADASTRADO?<br>
          </div>
          <?php if(isset($e)){ echo $e->getMessage();}?>
          <?php echo form_open('usuarios');?>
     <center>
            <div class="form-group col-lg-3">
                <input style="text-align: center;" class="form-control" type="text" name="txt-user" placeholder="Apelido">
            </div>
            <div class="col-lg-3">
                <input style="text-align: center;" class="form-control col-xs-1" type="password" name="txt-senha" placeholder="Senha">
            </div>
          <br>
           <button class="btn btn-primary btn-xl text-uppercase js-scroll-trigger">Entrar</button>
          <?php echo form_close(); ?>
        </div>
      </center>
</header>