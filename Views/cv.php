 <main class="py-5">
<section id="listado" class="mb-5">
     <div class="container">
          <h3 class="mb-3">CVs</h3>
          <div>
          <table border='1'>
          
               <?php $thefolder = "Data/archivos/";
               if ($handler = opendir($thefolder)) {
                    echo "<ul>";
               while (false !== ($file = readdir($handler))) {
                    if ($file != '.' && $file != '..'){ ?>
          <tr>
          <td><?php echo $file; ?></td>
          <td><a title="Descargar Archivo" href="Data/archivos/<?php echo $file; ?>" download="<?php echo $file; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>Descargar</a></td>
          </tr>
          <?php }
     }
     echo "</ul>";
     closedir($handler);
     } ?>
      </table>
          <div class="mb-3">
         
     </div>
</section>
</main>
