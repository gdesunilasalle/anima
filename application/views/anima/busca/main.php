
<div>
<header class="mastheadlg">
      <div class="container">
        <div class="intro-text">
   </div> 

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br>


          <?php 
$query = $this->db->get('transportesemcurso');
foreach ($query->result() as $row)
{
        echo $row->origem;
        echo $row->destino;
        echo $row->horario;
}


 ?>
          </div>
     
        </div>
    </header>
   

