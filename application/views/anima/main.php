
<div>
<header class="mastheadlg">
      <div class="container">
        <div class="intro-text">



          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



          <?php foreach($query as $row): ?>
<tr>
    <td><?php echo $row->origem; ?></td>
    <td><?php echo $row->destino; ?></td>
    <td><?php echo $row->horario; ?></td>
</tr>
<?php endforeach; ?>




          </div>
        












        </div>
    </header>
