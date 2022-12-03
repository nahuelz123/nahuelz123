<?php 

if (is_null($_SESSION['user'])){
     echo "<script> if(confirm('la compañia se cargo con exito!'));";
     echo "window.location = '../index.php'; </script>";
  }

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Company List</h2>
               <form action=<?php echo FRONT_ROOT ?>Company\SeeCompany method="post">
                    <div class="mb-3">
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control form-control-ml" placeholder="name" required>
                         <div class="mb-3">
                              <button type="submit" name="" class="btn btn-primary ml-auto d-block">search</button>
                         </div>
                    </div>
                    <table class="table bg-light-alpha" border="1"> 
                         <thead class="bg-dark text-white">
                              <?php foreach ($companytList as $key => $value) : ?>
                                   <tr>
                                   <?php $name = $value->getCompanyName() ; ?>
                                   <td><a href=<?php echo FRONT_ROOT ?>Company\SeeCompany?name=<?php echo $name ?>>
                                         Company Name <?php echo $value->getCompanyName() ; ?> </td>
                                   </a>
                              
                                   </tr>
                              <?php endforeach; ?>
                         </thead>

                    </table>
          </div>
     </section>


    

 
</main>

