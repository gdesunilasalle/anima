<header class="martelotte">
<div class="container">
<center>
<section id="cadastro">
      <div class="container">
        <h3 class="section-heading text-uppercase sombras"><u>Meu painel de caronas</u></h3>
        <br>
<?php if (!$caronas && !$passageiro){
echo '<h3 class="section-subheading sombras">Você não está participando de nenhuma carona no momento.<br><br><br>Deseja oferecer uma carona? <a href="'.base_url('oferece').'" class="">Clique aqui!</a><br><br><br>Deseja entrar em uma carona? <a href="'.base_url('busca').'" class="">Clique aqui!</a></h3>';
}else if($caronas && !$passageiro){
  echo '<h3 class="section-heading text-uppercase sombras">Carona oferecida por mim</h3>
<h3 class="section-subheading sombras">Aqui você pode editar a carona, removê-la ou conversar com seus colegas pelo chat</h3>';
foreach ($caronas as $info) {
  $username = substr($info->emailusuario, 0, strpos($info->emailusuario, '@'));
  $username = str_replace(".", " ", "$username");
  $username = ucwords($username);
echo $this->session->flashdata('message').'<div class="card w-100">
			  <div class="card-header">
		    <h5 class="text-success">'.$username.'</h5>
    <p class="text-secondary"><i>'.$info->cursousuario;
    if($info->especificacursousuario){echo ' - '.$info->especificacursousuario;}
    echo '</i></p>
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			'.$info->origemusuario.'</p>
			<p class="text-secondary">
			'.$info->destinousuario.'</p>
      <p>
      <a class="btn btn-outline-success" target="_blank" href="https://www.google.com/maps/dir/'.$info->origemusuario.'/'.$info->destinousuario.'">Visualizar rota</a>
      </p>
			<p class="text-secondary">Hoje -
			'.$info->horariousuario.'h</p>
			<p class="text-secondary">
			'.$info->meio.'</p>'.form_open('card').'
<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.
form_submit(array('id' => 'submit', 'value' => 'Ver detalhes', 'class'=>'btn btn-primary')).
	'<a href="'.base_url('oferece').'" class="btn btn-primary">Alterar carona</a>
           <a class="btn btn-primary" data-toggle="modal" href="#alertaModal1">
           <div class="comofunciona-hover">
           <div class="comofunciona-hover-content">
           </div>
           </div>
           Apagar carona
           </a>'.form_close();
}
}else if(!$caronas && $passageiro){
echo '<h3 class="section-heading text-uppercase sombras">Carona onde sou passageiro</h3>
<h3 class="section-subheading sombras">Aqui você pode sair da carona ou conversar com seus colegas pelo chat</h3>';
foreach ($passageiro as $info){
  $username = substr($info->emailusuario, 0, strpos($info->emailusuario, '@'));
  $username = str_replace(".", " ", "$username");
  $username = ucwords($username);
echo $this->session->flashdata('message').

		'<div class="card w-100">
			  <div class="card-header">
		    <h5 class="text-success">'.$username.'</h5>
    <p class="text-secondary"><i>'.$info->cursousuario;
    if($info->especificacursousuario){echo ' - '.$info->especificacursousuario;}
    echo '</i></p>'.'
  </div>
  <div class="card-body">
   		<p class="text-secondary">
			'.$info->origemusuario.'</p>
			<p class="text-secondary">
			'.$info->destinousuario.'</p>
      <p>
      <a class="btn btn-outline-success" target="_blank" href="https://www.google.com/maps/dir/'.$info->origemusuario.'/'.$info->destinousuario.'">Visualizar rota</a>
      </p>
			<p class="text-secondary">Hoje -
			'.$info->horariousuario.'h</p>
			<p class="text-secondary">
			'.$info->meio.'</p>'.form_open('card').'
<input type="hidden" name="dusuario" id="dusuario" value="'.$info->emailusuario.'">'.form_submit(array('id' => 'submit', 'value' => 'Ver detalhes', 'class'=>'btn btn-primary')).form_close().'
</div>
</div>';
}
}
?>
</div>
</div>
<br><br><br><br><br><br><br><br>
</header>
