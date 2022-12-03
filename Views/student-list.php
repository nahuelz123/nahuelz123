<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Student List</h2>
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/boot">
               <table class="table bg-light" border="1">

                    <thead>

                         <th>StudentId</th>
                         <th>CareerId</th>
                         <th>FirstName</th>
                         <th>LastName</th>
                         <th>Dni</th>
                         <th>FileNumber</th>
                         <th>Gender</th>
                         <th>BirthDate</th>
                         <th>Email</th>
                         <th>PhoneNumber</th>
                    </thead>
                    <tbody>

                         <?php
                         $datos = array();
                         foreach ($postulaciones as $student) : ?>
                              <tr>
                                   <?php

                                   ?>
                                   <td> <?php echo $student->getStudentId() . '<br>'; ?></td>
                                   <td><?php echo $student->getCareerId() . '<br>'; ?></td>
                                   <td> <?php echo $student->getFirstName() . '<br>'; ?></td>
                                   <td><?php echo $student->getLastName() . '<br>';  ?></td>
                                   <td> <?php echo $student->getDni() . '<br>';  ?></td>
                                   <td> <?php echo $student->getFileNumber() . '<br>';  ?></td>
                                   <td><?php echo $student->getGender() . '<br>'; ?></td>
                                   <td><?php echo $student->getBirthDate() . '<br>';  ?></td>
                                   <td> <?php echo $student->getEmail() . '<br>'; ?></td>
                                   <td> <?php echo $student->getPhoneNumber() . '<br>';  ?></td>

                                   <td> <a class="btn btn-primary btn-block btn-lg" href=<?php echo FRONT_ROOT ?>Application\cancelarPostulacion?id_JobOfert=<?php echo $id_JobOfert ?>&studentId=<?php echo $student->getStudentId() ?> role="button">cancelar postulacion</a></td>
                              </tr>


                         <?php endforeach; ?>


                    </tbody>
               </table>

               <div>
                    <a class="btn btn-primary btn-lg " href=<?php echo FRONT_ROOT ?>Student\ObtenerPdf?id_JobOfert=<?php echo $id_JobOfert ?> role="button"> crear pdf</a>




               </div>

</main>