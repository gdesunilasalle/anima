<header class="martelotte"  id="wrap">
<div class="container">
<center>
<section id="cadastro">
<div class="container">
<script>
$(document).ready(function(){
var $textarea = $('#chat');
$textarea.scrollTop($textarea[0].scrollHeight);
});
</script>
<h2 class="section-heading text-uppercase sombras">Detalhes da carona</h2>
<h3 class="section-subheading sombras">E então... Anima?!</h3>
<?php
date_default_timezone_set('America/Sao_Paulo');
$horalocal = date("Y-m-d H:i:s");
$count='0';
?>
<?php foreach ($caronas as $info) {

// INICIO DA EXIBIÇÃO DE CARD QUANDO O USUÁRIO É O DONO DA CARONA ===========================

if($info->emailusuario == $this->session->userdata('email')){

	$username = substr($info->emailusuario, 0, strpos($info->emailusuario, '@'));
	$username = str_replace(".", " ", "$username");
	$username = ucwords($username);

echo '<div class="card w-100">
	  <div class="card-header">
    <h5 class="text-success">'.$username.'</h5>
    <p class="text-secondary"><i>'.$info->cursousuario;
    if($info->especificacursousuario){echo ' - '.$info->especificacursousuario;}
    echo '</i></p>
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			<b>O trajeto da carona é '.$info->origemusuario.' - '.$info->destinousuario.', hoje '.$info->horariousuario.'h
			<p class="text-secondary">Meio de transporte: '.$info->meio.'</p></b>
			<p>
			<a class="btn btn-outline-success" target="_blank" href="https://www.google.com/maps/dir/'.$info->origemusuario.'/'.$info->destinousuario.'">Visualizar rota</a>
			</p>
			<p class="text-dark" align="left">
			Usuários confirmados:
			</p>';
if(!$confirmados){echo '<p class="text-secondary" align="left"><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nenhum usuário presente no momento...</i></p>';}else{
foreach ($confirmados as $infoconfirmados) {
	$username = substr($infoconfirmados->emailusuario, 0, strpos($infoconfirmados->emailusuario, '@'));
	$username = str_replace(".", " ", "$username");
	$username = ucwords($username);
echo '<p class="text-secondary" align="left"><a class="btn btn-sm btn-outline-danger" data-toggle="modal" href="#'.$infoconfirmados->emailusuario.'"> X </a> '.$username.'<i> - '.$infoconfirmados->cursousuario;
    if($infoconfirmados->especificacursousuario){echo ' - '.$infoconfirmados->especificacursousuario;}
    echo '</i></p>
<!-- alertaModal3 = REMOVER PASSAGEIRO -->
    <div class="comofunciona-modal modal fade" id="'.$infoconfirmados->emailusuario.'" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body" align="center">
                  <h2 class="item-intro text-dark">REMOVER PASSAGEIRO?</h2>
                  <p class="item-intro text-muted">Tem certeza que deseja remover o(a) passageiro(a): </p>
                  <p align="center" class="item-intro text-dark">'
                 .$username.form_open(base_url('chat_mensagem/chuta')).'<input type="hidden" name="dusuario" id="dusuario" value="'.$infoconfirmados->emailusuario.'">'.form_submit(array('id' => 'submit', 'value' => 'Remover passageiro(a)', 'class'=>'btn btn-danger')).form_close().'
                  <br>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Cancelar</button></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>';
	}
	}
	echo form_open('chat_mensagem/refresh').'<p align="right"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
	form_submit(array('id' => 'submit', 'value' => '⟳', 'class'=>'btn btn-sm btn-success'));
	echo form_close();
	echo '</p><div class="form-group"><textarea id="chat" readonly class="form-control" style="min-width: 100%; resize: none" rows=8>';
foreach ($chat as $infochat) {
if($infochat->horachat){
echo '('.$infochat->horachat.')';}
echo ' ';
/*if ($infochat->hostchat){
echo $infochat->hostchat;}*/
echo ' ';
if ($infochat->passageirochat){
$username = substr($infochat->passageirochat, 0, strpos($infochat->passageirochat, '@'));
$username = str_replace(".", " ", "$username");
$username = ucwords($username);
echo $username;
}
echo ': ';
echo $infochat->mensagemchat;
echo '
';
				}
				echo '</textarea>';
	  echo form_open('chat_mensagem').'
		<input type="text" autocomplete="off" placeholder="Digite sua mensagem" class="form-control" name="dmensagem" id="dmensagem" size="10" maxlength="100" required>
		<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">
		<input type="hidden" name="dhora" id="dhora" value="'.$horalocal.'">
		<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'"></div>'.
		form_submit(array('id' => 'submit', 'value' => 'Enviar mensagem', 'class'=>'btn btn-primary')).'
		<a href="'.base_url('busca').'" class="btn btn-primary">Voltar para busca</a>
		<a class="btn btn-primary" data-toggle="modal" href="#alertaModal1">
		           <div class="comofunciona-hover">
		           <div class="comofunciona-hover-content">
		           </div>
		           </div>
		           Apagar carona
		           </a>';

// FIM DA EXIBIÇÃO DE CARD QUANDO O USUÁRIO É O DONO DA CARONA ===========================

// INICIO DA EXIBIÇÃO DE CARD QUANDO O USUÁRIO É PASSAGEIRO ===========================

}else if($info->emailusuario != $this->session->userdata('email')){

		foreach ($confirmados as $infoconfirmados) {
		if ($infoconfirmados->emailusuario == $this->session->userdata('email') ) {
			$count++;
	}}if ($count!='0'){

		$username = substr($info->emailusuario, 0, strpos($info->emailusuario, '@'));
		$username = str_replace(".", " ", "$username");
		$username = ucwords($username);

		echo '<div class="card w-100">
			  <div class="card-header">
		    <h5 class="text-success">'.$username.'</h5>
		    <p class="text-secondary"><i>'.$info->cursousuario;
		    if($info->especificacursousuario){echo ' - '.$info->especificacursousuario;}
		    echo '</i></p>
		  </div>
		  <div class="card-body">
		   		<p class="text-secondary">
					<b>O trajeto da carona é '.$info->origemusuario.' - '.$info->destinousuario.', hoje '.$info->horariousuario.'h
					<p class="text-secondary">Meio de transporte: '.$info->meio.'</p></b>
					<p>
					<a class="btn btn-outline-success" target="_blank" href="https://www.google.com/maps/dir/'.$info->origemusuario.'/'.$info->destinousuario.'">Visualizar rota</a>
					</p>
					<p class="text-dark" align="left">
					Usuários confirmados:
					</p>';
					if(!$confirmados){echo '<p class="text-secondary" align="left"><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nenhum usuário presente no momento...</i></p>';}else{
					foreach ($confirmados as $infoconfirmados) {
						$username = substr($infoconfirmados->emailusuario, 0, strpos($infoconfirmados->emailusuario, '@'));
						$username = str_replace(".", " ", "$username");
						$username = ucwords($username);
						echo '<p class="text-secondary" align="left">'.$username.' - <i>'.$infoconfirmados->cursousuario.'</i>';
						 if($info->especificacursousuario){echo ' (<i>'.$infoconfirmados->especificacursousuario.'</i>)';}
						$count++;
						}
					}
		echo form_open('chat_mensagem/refresh').'<p align="right"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
		form_submit(array('id' => 'submit', 'value' => '⟳', 'class'=>'btn btn-sm btn-success'));
		echo form_close();
		echo '</p><div class="form-group"><textarea id="chat" readonly class="form-control" style="min-width: 100%; resize: none" rows=8>';

foreach ($chat as $infochat) {
if($infochat->horachat){
echo '('.$infochat->horachat.')';}
echo ' ';
/*if ($infochat->hostchat){
echo $infochat->hostchat;}*/
echo ' ';
if ($infochat->passageirochat){
$username = substr($infochat->passageirochat, 0, strpos($infochat->passageirochat, '@'));
$username = str_replace(".", " ", "$username");
$username = ucwords($username);
echo $username;
}
echo ': ';
echo $infochat->mensagemchat;
echo '
';
					}
					echo '</textarea>';
		//FIM DE EXIBIÇÃO DO CHAT QUANDO O USUÁRIO É O HOST
		echo form_open('chat_mensagem').'<input type="text" autocomplete="off" placeholder="Digite sua mensagem" class="form-control" name="dmensagem" id="dmensagem" size="10" maxlength="100"
		value="" required><input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">
		<input type="hidden" name="dhora" id="dhora" value="'.$horalocal.'">
		<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'"></div>';
		echo form_submit(array('id' => 'submit', 'value' => 'Enviar mensagem', 'class'=>'btn btn-primary')).'
		<a href="'.base_url().'busca" class="btn btn-primary">Voltar para busca</a> <a class="btn btn-primary" data-toggle="modal" href="#alertaModal2">
           <div class="comofunciona-hover">
           <div class="comofunciona-hover-content">
           </div>
           </div>
           Sair da carona
           </a>';
	}else{
		// INICIO DA EXIBIÇÃO DE CARD QUANDO O USUÁRIO ESTÁ OLHANDO A CARONA MAS AINDA NAO É PASSAGEIRO ===========================

				$username = substr($info->emailusuario, 0, strpos($info->emailusuario, '@'));
				$username = str_replace(".", " ", "$username");
				$username = ucwords($username);

				echo '<div class="card w-100">
					  <div class="card-header">
				    <h5 class="text-success">'.$username.'</h5>
		    <p class="text-secondary"><i>'.$info->cursousuario;
		    if($info->especificacursousuario){echo ' - '.$info->especificacursousuario;}
		    echo '</i></p>
		  </div>
		  <div class="card-body">
		   		<p class="text-secondary">
					<b>O trajeto da carona é '.$info->origemusuario.' - '.$info->destinousuario.', hoje '.$info->horariousuario.'h
					<p class="text-secondary">Meio de transporte: '.$info->meio.'</p></b>
					<p>
					<a class="btn btn-outline-success" target="_blank" href="https://www.google.com/maps/dir/'.$info->origemusuario.'/'.$info->destinousuario.'">Visualizar rota</a>
					</p>
					<p class="text-dark" align="left">
					Usuários confirmados:
					</p>';
		if(!$confirmados){echo '<p class="text-secondary" align="left"><i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nenhum usuário presente no momento...</i></p>';}else{
		foreach ($confirmados as $infoconfirmados) {
			$username = substr($infoconfirmados->emailusuario, 0, strpos($infoconfirmados->emailusuario, '@'));
			$username = str_replace(".", " ", "$username");
			$username = ucwords($username);
			echo '<p class="text-secondary" align="left">'.$username.' - <i>'.$infoconfirmados->cursousuario.'</i>';
			 if($info->especificacursousuario){echo ' (<i>'.$infoconfirmados->especificacursousuario.'</i>)';}
			$count++;
			}
		}
			echo '<center>';
			if($info->meio == 'Uber' && $count == 3){
				echo '<div class="alert alert-danger" role="alert"><strong>Chegou tarde demais! </strong>Este Uber está lotado!<br></div><a href="'.base_url().'busca" class="btn btn-primary">Voltar para busca</a>';
			}else if($info->meio == 'Carro' && $count == 4){
				echo '<div class="alert alert-danger" role="alert"><strong>Chegou tarde demais! </strong>Este Carro está lotado!<br></div><a href="'.base_url().'busca" class="btn btn-primary">Voltar para busca</a>';
			}else{
			echo form_open('adere');
			echo '<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">';
			foreach ($curso_passageiro as $info){
			echo '<input type="hidden" name="dcursousuario" value="'.$info->curso_usuario.'">
			<input type="hidden" name="despecificacursousuario" value="'.$info->especifica_curso_usuario.'">';
			}
			echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="'.base_url().'busca" class="btn btn-primary">Voltar para busca</a>';
			echo form_close();
			}
	}
}
}
?>
</form>
</div>
</div>
</div>
</div>
</header>
<div class="py-0 text-secundary" style="position: fixed; width: 100%; bottom: 0; background-color:#660298;">
&nbsp;
</div>
<!-- INÍCIO DO RODAPÉ -->
<!--<div class="copyright  intro-lead-in sombras text-white" style="background-color:#660298"> -->
<!-- alertaModal1 = REMOVER CARONA -->
<div class="comofunciona-modal modal fade" id="alertaModal1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<div class="modal-body" align="center">
							<!-- Project Details Go Here -->
							<h2 class="text-uppercase">REMOVER CARONA?</h2>
							<p class="item-intro text-muted">Tem certeza que deseja remover a carona?</p>
							<p><a href="<?php echo base_url('apagacarona'); ?>" class="btn btn-danger">Remover carona</a></p>
							<button class="btn btn-primary" data-dismiss="modal" type="button">
								<i class="fa fa-times"></i>
								Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- alertaModal2 = SAIR DA CARONA -->
<div class="comofunciona-modal modal fade" id="alertaModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<div class="modal-body" align="center">
							<!-- Project Details Go Here -->
							<h2 class="text-uppercase">SAIR DA CARONA?</h2>
							<p class="item-intro text-muted">Tem certeza que deseja sair da carona?</p>
							<a href="<?php $email = $this->session->userdata('email'); echo base_url('apagacarona/sairdacarona/'); echo $email; ?>" class="btn btn-danger">Sair da carona</a></p>
							<button class="btn btn-primary" data-dismiss="modal" type="button">
								<i class="fa fa-times"></i>
								Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="<?php echo base_url('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- Plugin JavaScript -->
<script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<!-- Contato form JavaScript -->
<script src="<?php echo base_url('js/jqBootstrapValidation.js'); ?>"></script>
<script src="<?php echo base_url('js/contato_me.js'); ?>"></script>
<!-- Custom scripts for this template -->
<script src="<?php echo base_url('js/agency.min.js'); ?>"></script>
</html>
