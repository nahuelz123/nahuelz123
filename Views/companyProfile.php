<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Company List</h2>

               <table class="table bg-light" border="1">

                    <thead>

                         <th>Company name</th>
                         <th>Business Name</th>
                         <th>Company Adress</th>
                         <th>Cuil</th>
                         <th>Telephone</th>
                         <th>Email</th>
                         <th>Web </th>
                    </thead>
                    <tbody>

                         <?php
                         foreach ($companytList as $company) :
                              if ($company->getEmail() == $_SESSION["email"]) {
                         ?>
                                   <tr>
                                        <td> <?php echo $company->getCompanyName(); ?> </td>
                                        <td><?php echo $company->getBusinessName(); ?> </ñ>
                                        <td> <?php echo $company->getCompanyAdress(); ?> </td>
                                        <td><?php echo $company->getCuil(); ?>
                                        <td> <?php echo $company->getTelephone(); ?> </td>
                                        <td> <?php echo $company->getEmail(); ?> </td>
                                        <td> <?php echo $company->getWeb(); ?> </td>
                                        <br>

                              <?php }
                         endforeach; ?>


                    </tbody>
               </table>


</main>