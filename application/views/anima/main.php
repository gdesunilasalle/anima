<header class="masthead">
      <div class="container">
        <div class="intro-text">
          
          



          <?php foreach($query as $row): ?>
<tr>   
    <td><?php echo $row->origem; ?></td>
    <td><?php echo $row->destino; ?></td>
    <td><?php echo $row->horario; ?></td>
</tr>
<?php endforeach; ?>




          </div>






<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





        </div>
    </header>