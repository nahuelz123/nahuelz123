
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Job Applications List</h2>
               <table class="table bg-light-alpha" border="1"> 
                         <thead class="bg-dark text-white">
                      
                              <?php foreach ($jobApplication as $key => $value) : ?>
                                   <?php $id_JobOfert = $value->getId_JobOfert() ; ?>
                                   <tr>
                                   <td><a href=<?php echo FRONT_ROOT ?>Application\SeeApplication?id_JobOfert=<?php echo $id_JobOfert ?>>
                                        Job Offer <?php echo $value->getTitulo() ; ?> </td>
                                   </a>
                                   <br></tr>
                              <?php endforeach; ?>
                         </thead>

                    </table>
          </div>
     </section>

 
</main>

