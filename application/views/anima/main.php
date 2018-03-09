
<div>
<header class="mastheadlg">
      <div class="container">
        <div class="intro-text">


<div class="row">
   <div style="width:500px;margin:50px;">
    <h4>Display Records From Database Using Codeigniter</h4>
    <table class="table table-striped table-bordered">
     <tr><td><strong>Origem</strong></td><td><strong>Destino</strong></td><td><strong>Horário</strong></td></tr> 
     <?php foreach($CARONAS as $carona){?>
     <tr><td><?=$carona->origem;?></td><td><?=$carona->destino;?></td><td><?=$carona->horario;?></td><td></td></tr>     
        <?php }?>  
    </table>
   </div> 

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

          </div>
     
        </div>
    </header>
