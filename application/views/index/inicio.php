<header class="masthead">
      <div class="container" id="inicio">
        <div class="intro-text">
          
          <div class="intro-lead-in">Seja muito bem vindo ao Anima!</div>
          <div class="intro-heading text-uppercase">JÁ É CADASTRADO?<br>
          <!-- BOTÃO DO MODAL 
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="" data-toggle="modal" data-target="#login-modal">Login</a>
          FIM DO BOTAO MODAL-->
          </div>

          <!-- INICIO DO MODAL BOOTSTRAP - LAYER DE LOGIN 

          <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
              <br>
              <br>
					<h1>Acesso do usuário:</h1><br>
				        <?php  
                  //echo validation_errors('<div class="alert alert-danger">','</div>');
                  //echo form_open('usuarios/login');
                ?>
                                        
					<input type="text" name="user" placeholder="Apelido">
                <br>
                <br>
					<input type="password" name="pass" placeholder="Senha">
                <br>
                <br>
					<input type="submit" name="login" class="login loginmodal-submit" value="Entrar">
          <button class="btn btn-primary btn-xl text-uppercase">Entrar</button>
          <?php  
          //echo form_close();
          ?>                           
				  <div class="login-help">
					<a href="#">Esqueci minha senha</a>
				  </div>
				</div>
			</div>
		  </div>
         FIM DO MODAL - VAMOS HABILITÁ-LO DEPOIS DOS TESTES DE LOGIN -->
          <?php  
                echo form_error('txt-user');
                echo form_error('txt-senha');
                //echo validation_errors('<div class="alert alert-danger">','</div>');
                echo form_open('usuarios/login');
          ?>
     <center>
            <div class="form-group col-lg-3">
                <input style="text-align: center;" class="form-control" type="text" name="txt-user" placeholder="Apelido">
            </div>
            <div class="col-lg-3">
                <input style="text-align: center;" class="form-control col-xs-1" type="password" name="txt-senha" placeholder="Senha">
            </div>
          <br>
           <button class="btn btn-primary btn-xl text-uppercase js-scroll-trigger">Entrar</button>
				   
          <?php  
          echo form_close();
          ?>
          <!-- FIM DO MODAL BOOTSTRAP - LAYER DE LOGIN -->
        </div>
    </header>