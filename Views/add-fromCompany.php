<form action=<?php echo FRONT_ROOT ?>Company\companyNew method="POST">
     <div class="container">
          <h3 class="mb-3">Add Company</h3>

          <div class="mb-3">

               <label for="CompanyName">Name</label>
               <input type="text" name="CompanyName" class="form-control form-control-ml" placeholder="name" required>

          </div>

          <div class="mb-3">
               <label for="BusinessName">Business name</label>
               <input type="text" name="BusinessName" class="form-control form-control-ml" placeholder="business name" required>
          </div>
          <div class="mb-3">
               <label for="CompanyAdress">Address</label>
               <input type="text" name="CompanyAdress" class="form-control form-control-ml" placeholder="user" required>
          </div>

          <div class="mb-3">
               <label for="cuil">Cuil</label>
               <input type="text" name="cuil" class="form-control form-control-ml" placeholder="Cuil" required>
          </div>
          <div>
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
          <div class="form-group">
               <label for="">Contraseña</label>
               <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña">
          </div>

          <div class="mb-3">
               <button type="submit" name="" class="btn btn-primary ml-auto d-block">Create Company</button>
          </div>
     </div>

</form>