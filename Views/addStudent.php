
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Student</h2>
               <form action="<?php echo FRONT_ROOT ?>Student/AddNew" method="post" class="bg-light-alpha p-5">
                    <div class="mb-3">
                         <label for="email">Email</label>
                         <input type="text" name="email" class="form-control form-control-ml" placeholder="email" required>
                         <div class="mb-3">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control form-control-ml" placeholder="password" required>
                              <div class="mb-3">
                                   <button type="submit" name="" class="btn btn-primary ml-auto d-block">Register</button>
                              </div>
                         </div>
                         <a href=<?php echo FRONT_ROOT ?>>return</a>

               </form>
          </div>
     </section>
</main>
