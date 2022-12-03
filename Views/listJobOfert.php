<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de ofertas</h2>
               <form action=<?php echo FRONT_ROOT ?>Ofert\serachOfert method="post">

                    <div class="mb-3">

                         <select id="puesto" name="puesto">
                              <?php
                              foreach ($position as $jobOfert) : ?>
                                   <?php // $puesto = $jobOfert->getPuesto();
                                   $puesto = $jobOfert;
                                   $puesto = str_replace(" ", "-", $puesto);

                                   ?>

                                   <option value=<?= $puesto ?>><?php echo $puesto ?></option>

                                   </a>
                                   <br>
                              <?php endforeach; ?>
                         </select>
                         <button type="submit" name="" class="btn btn-primary ml-auto d-block">Search</button>
                    </div>
                    <div>
                         <table class="table bg-light-alpha" border="1" TABLE ALIGN="center">
                              <thead class="bg-dark text-white">
                                   <?php foreach ($jobOfertFiltro as $key => $value) : ?>
                                        <tr>

                                             <?php $id_JobOfert = $value->getId_JobOfert(); ?>
                                             <td><a href=<?php echo FRONT_ROOT ?>Ofert\SeeOfert?id_JobOfert=<?php echo $id_JobOfert ?>>
                                                       Job Offer <?php echo $value->getTitulo(); ?> </td>
                                             </a>
                                        </tr>
                                   <?php endforeach; ?>
                              </thead>

                         </table>
                    </div>
          </div>
     </section>

</main>