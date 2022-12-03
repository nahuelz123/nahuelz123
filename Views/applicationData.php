
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Postulation List</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">


                         <li>Title <?php echo $key->getTitulo(); ?> </li>
                         <li>Workload <?php echo $key->getCargaHoraria(); ?> </ñ>
                         <li>Position <?php echo $key->getPuesto(); ?> </li>
                         <li>Description <?php echo $key->getDescripcion(); ?> </li>
                         <br>


                    </thead>

               </table>
         <?php   $id_JobOfert = $key->getId_JobOfert(); ?>    
              
                    <a class="btn btn-primary btn-block btn-lg" href=<?php echo FRONT_ROOT ?>Application\deleteApplication?id_JobOfert=<?php echo $id_JobOfert ?> role="button">Cancel Postulation</a>



</main>