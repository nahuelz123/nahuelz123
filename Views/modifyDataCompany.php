<?php 

$id_company;

//echo "modify cuil:  $id_company  <br>";
?>


<main class="py-5">
     <section id="listado" class="mb-5">
          <form action=<?php echo FRONT_ROOT ?>Company\CompanyMody method="POST">
               <div class="container">
                    <h3 class="mb-3">Edit Company</h3>


                    <div class="mb-3">

                         <label for="CompanyName">Name</label>
                         <input type="text" name="CompanyName" class="form-control form-control-ml" placeholder="name" required>
                 


                    </div>

                    <div class="mb-3">
                         <label for="BusinessName">Business Name</label>
                         <input type="text" name="BusinessName" class="form-control form-control-ml" placeholder="business name" required>
                    </div>
                    <div class="mb-3">
                         <label for="CompanyAdress">Address</label>
                         <input type="text" name="CompanyAdress" class="form-control form-control-ml" placeholder="user" required>
                         <input type=hidden value=<?= $id_company ?> name="id_company">
                         <div class="mb-3">
                              <label for="cuil">Cuil</label>
                              <input type="text" name="cuil" class="form-control form-control-ml" placeholder="Cuil" required>
                         </div>
                         <div class="mb-3">
                              <label for="telephone">Telephone</label>
                              <input type="text" name="telephone" class="form-control form-control-ml" placeholder="telephone" required>
                         </div>
                         <div class="mb-3">
                              <label for="email">E-mail</label>
                              <input type="email" name="email" class="form-control form-control-ml" placeholder="email" required>
                         </div>
                         <div class="mb-3">
                              <label for="web">Web</label>
                              <input type="text" name="web" class="form-control form-control-ml" placeholder="web" required>
                         </div>
                         
                         <input type=hidden value=<?= $password ?> name="password">

                         <div class="mb-3">
                              <button type="submit" name="" class="btn btn-primary ml-auto d-block">Modify Company</button>
                         </div>
                    </div>
          </form>

       
     </section>
</main>
