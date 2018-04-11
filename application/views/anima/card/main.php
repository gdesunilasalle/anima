<div>
<header class="martelotte">
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
$count='0';
if($confirmados!=NULL || $info->emailusuario == $this->session->userdata('email')){
foreach ($confirmados as $infoconfirmados) {
	if ($infoconfirmados->emailusuario == $this->session->userdata('email') ) {
		$count++;
}
		
		if($info->emailusuario == $this->session->userdata('email')){
			echo form_open('chat_mensagem/chuta').'<p class="text-secondary" align="left"><input type="hidden" name="dusuario" id="dusuario" value="'.$infoconfirmados->emailusuario.'">'.$infoconfirmados->emailusuario.' '.
			form_submit(array('id' => 'submit', 'value' => 'X', 'class'=>'btn btn-sm btn-outline-warning'));
			echo form_close();
			 
		}else{echo $infoconfirmados->emailusuario;}
		echo '</p>';
	}

if ($info->emailusuario == $this->session->userdata('email')){
//INÍCIO DE EXIBIÇÃO DO CHAT QUANDO O USUÁRIO É O HOST
echo form_open('chat_mensagem/refresh').'<p align="right"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => '⟳', 'class'=>'btn btn-primary'));
echo form_close();
echo '</p><div class="form-group"><textarea id="chat" readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 

foreach ($chat as $infochat) {


			if($infochat->horachat){
			echo '('.$infochat->horachat.')';}
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
			echo '</textarea>';
//FIM DE EXIBIÇÃO DO CHAT QUANDO O USUÁRIO É O HOST
  echo form_open('chat_mensagem').'<input type="text" autocomplete="off" placeholder="Digite sua mensagem" class="form-control" name="dmensagem" id="dmensagem" size="10" maxlength="100" 
value="" required><input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'"><input type="hidden" name="dhora" id="dhora" value="'.$horalocal.'"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'"></div>'.

form_submit(array('id' => 'submit', 'value' => 'Enviar mensagem', 'class'=>'btn btn-primary')).'

<a href="busca" class="btn btn-primary">Voltar para busca</a> <a href="Apagacarona" class="btn btn-danger">Remover carona</a>';
echo form_close();


	}else if($info->emailusuario != $this->session->userdata('email') && $count!='1'){
		echo '<center>';
		echo form_open('adere');
		echo '<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">';
		echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';
		echo form_close();
			}

else if ($count=='1'){
//INÍCIO DE EXIBIÇÃO DO CHAT UANDO O USUÁRIO É PASSAGEIRO
echo form_open('chat_mensagem/refresh').'<p align="right"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => '⟳', 'class'=>'btn btn-primary'));
echo form_close();
echo '</p><div class="form-group"><textarea id="chat" readonly class="form-control" style="min-width: 100%; resize: none" rows=8 id="chat">'; 

foreach ($chat as $infochat) {


			if($infochat->horachat){
			echo '('.$infochat->horachat.')';}
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
			echo '</textarea>';
//FIM DE EXIBIÇÃO DO CHAT QUANDO O USUÁRIO É O HOST
  echo form_open('chat_mensagem').'<input type="text" autocomplete="off" placeholder="Digite sua mensagem" class="form-control" name="dmensagem" id="dmensagem" size="10" maxlength="100" 
value="" required><input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'"><input type="hidden" name="dhora" id="dhora" value="'.$horalocal.'"><input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'"></div>'.

form_submit(array('id' => 'submit', 'value' => 'Enviar mensagem', 'class'=>'btn btn-primary')).'

<a href="busca" class="btn btn-primary">Voltar para busca</a> <a href="apagacarona/sairdacarona/'.$info->emailusuario.'" class="btn btn-danger">Sair da carona</a>';
echo form_close();
}   
}else{

		echo '<i>Nenhum usuário confirmado ainda, <b>seja o primeiro!</b></i><center>';
		echo form_open('adere');
		echo '<input type="hidden" name="dproponente" id="dproponente" value="'.$info->emailusuario.'">';
		echo form_submit(array('id' => 'submit', 'value' => 'Estou dentro!', 'class'=>'btn btn-primary')); echo '<a href="busca" class="btn btn-primary">Voltar para busca</a>';
		echo form_close();



}
}
?>
</form>
</div>
</div>
</div>
</div>
</header>