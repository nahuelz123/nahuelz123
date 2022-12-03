<?php

$id_JobOfert;
?>

<main class="py-5">
    <section id="listado" class="mb-5">

        <form action=<?php echo FRONT_ROOT ?>Ofert\JobOfertMody method="POST">
            <div class="container">
                <h3 class="mb-3">Edit Job Offer </h3>

                <div class="mb-3">

                    <select id="id_company" name="id_company">
                        <?php
                        foreach ($companytList as $company) : ?>
                            <?php $name = $company->getCompanyName();
                            $id_company = $company->getId_company();
                            ?>

                            <option value=<?= $id_company ?>><?php echo $name ?></option>

                            </a>
                            <br>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">

                    <select id="jobPositionId" name="jobPositionId">

                        <?php
                        foreach ($jobPositionList as $jobPosition) : ?>
                            <?php $name = $jobPosition->getDescription();
                            $jobPositionId =   $jobPosition->getJobPositionId();
                            ?>

                            <option value=<?= $jobPositionId ?>> <?php echo $name ?> </option>


                            </a>
                            <br>
                        <?php

                        endforeach; ?>
                    </select>

                </div>


                <div class="mb-3">
                    <label for="cargaHoraria">Workload</label>
                    <input type="text" name="cargaHoraria" class="form-control form-control-ml" placeholder="cargaHoraria" required>
                    <input type=hidden value=<?= $id_JobOfert ?> name="id_JobOfert">
                </div>

                <div class="mb-3">
                    <label for="activo">Status</label>
                    <input type="text" name="activo" class="form-control form-control-ml" placeholder="activo" required>
                </div>

                <div class="mb-3">
                    <label for="titulo">Title</label>
                    <input type="text" name="titulo" class="form-control form-control-ml" placeholder="titulo" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion">Description</label>
                    <input type="text" name="descripcion" class="form-control form-control-ml" placeholder="descripcion" required>
                </div>
                <div class="form-group">
                         <label class="col-sm-2 control-label">Image</label>
                         <div class="col-sm-8">
                         <input type="file" class="form-control" id="imagen" name="imagen" multiple>
                         <!--<button name="submit" class="btn btn-primary">Add Imagen</button>-->
                         </div>
                </div>

                <div class="mb-3">
                    <button type="submit" name="" class="btn btn-primary ml-auto d-block">Modify Offer</button>
                </div>

            </div>


        </form>
    </section>
</main>
