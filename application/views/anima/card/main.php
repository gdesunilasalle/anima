<div>
<header class="martelotte">
<div class="container">
<center>
<section id="cadastro">
<div class="container">
<h2 class="section-heading text-uppercase sombras">Detalhes da carona</h2>
<h3 class="section-subheading sombras">E então... Anima?!</h3>
<?php foreach ($caronas as $info) {
$horalocal = date("Y-m-d H:i:s", strtotime('+19 hours'));
echo '<div class="card w-100">
	  <div class="card-header">
    <h5 class="text-success">'.$info->emailusuario.'</h5>
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			<b>O trajeto da carona é '.$info->origemusuario.' - '.$info->destinousuario.', hoje '.$info->horariousuario.'h
			<br>
			Meio de transporte: '.$info->meio.'</p></b>
			<p class="text-secondary" align="left">
			Usuários confirmados:
			<br>';

if($confirmados!=NULL){
foreach ($confirmados as $infoconfirmados) {
		echo $infoconfirmados->emailusuario;
		echo '<br>';
	}

if ($info->emailusuario == $this->session->userdata('email') || $infoconfirmados->emailusuario == $this->session->userdata('email')){
//INÍCIO DE EXIBIÇÃO DO CHAT

echo form_open('chat_mensagem').'<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => 'Refresh', 'class'=>'btn btn-primary'));
echo form_close();
echo '<div class="form-group"><textarea readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 

foreach ($chat as $infochat) {



			echo $infochat->horachat;
			echo ' '; 
			/*if ($infochat->hostchat){
			echo $infochat->hostchat;}*/
			echo ' ';
			if ($infochat->passageirochat){
			echo $infochat->passageirochat;}
			echo ': ';
			echo $infochat->mensagemchat;
echo '
';			
			}
			echo '</textarea></div>';
//FIM DE EXIBIÇÃO DO CHAT
  echo form_open('chat_mensagem').'<p><input type="text" placeholder="Digite sua mensagem" class="form-control" name="dmensagem" id="dmensagem" size="10" maxlength="100" 
value="" required></p><input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'"><input type="hidden" name="dhora" id="dhora" value="'.$horalocal.'"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.

form_submit(array('id' => 'submit', 'value' => 'Enviar mensagem', 'class'=>'btn btn-primary')).'

<a href="busca" class="btn btn-primary">Voltar para busca</a> <a href="apagacarona/sairdacarona/'.$info->emailusuario.'" class="btn btn-primary">Sair da carona</a>';
echo form_close();

}else{

echo '<center>';
		echo form_open('adere');
		echo '<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">';
		echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';


} 

	}else if($confirmados==NULL && $info->emailusuario != $this->session->userdata('email')){

	
		echo '<i>Nenhum usuário confirmado ainda</i>';
		echo '<center>';
		echo form_open('adere');
		echo '<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">';
		echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';
		echo form_close();
			}

else if ($info->emailusuario == $this->session->userdata('email') || $infoconfirmados->emailusuario == $this->session->userdata('email')){
//INÍCIO DE EXIBIÇÃO DO CHAT
echo '<div class="form-group"><textarea readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 

echo form_open('chat_mensagem').'<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => 'Refresh', 'class'=>'btn btn-primary'));
echo form_close();
echo '<div class="form-group"><textarea readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 

foreach ($chat as $infochat) {

			echo $infochat->horachat;
			echo ' '; 
			/*if ($infochat->hostchat){
			echo $infochat->hostchat;}*/
			echo ' ';
			if ($infochat->passageirochat){
			echo $infochat->passageirochat;}
			echo ': ';
			echo $infochat->mensagemchat;
echo '
';			
			}
			echo '</textarea></div>';
//FIM DE EXIBIÇÃO DO CHAT
  echo form_open('chat_mensagem').'<p><input type="text" placeholder="Digite sua mensagem" class="form-control" name="dmensagem" id="dmensagem" size="10" maxlength="100" 
value="" required></p><input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'"><input type="hidden" name="dhora" id="dhora" value="'.$horalocal.'"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.

form_submit(array('id' => 'submit', 'value' => 'Enviar mensagem', 'class'=>'btn btn-primary')).'

<a href="busca" class="btn btn-primary">Voltar para busca</a> <a href="apagacarona/sairdacarona/'.$info->emailusuario.'" class="btn btn-primary">Sair da carona</a>';
echo form_close();
}else{
	echo '<center>';
	echo form_open('adere');
	echo '<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">';
	echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';
}      
}
?>
</form>
</div>
</div>
</div>
</div>
</header>