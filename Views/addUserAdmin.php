
<main class="py-5">
     <section id="listado" class="mb-5">
<form action=<?php echo FRONT_ROOT?>User\AddAdmin method="POST" >
               <div class="container">
                    <h3 class="mb-3">Add ADMIN</h3>
                    
                    <div class="mb-3" >
     
                         <label for="email">EMAIL</label>
                         <input type="email" name="email" class="form-control form-control-ml" placeholder="name" required>
                         
                    </div>

                    <div class="mb-3">
                    <label for="password">PASSWORD</label>
                         <input type="password" name="password" class="form-control form-control-ml" placeholder="password" required>
                    </div>
                    
                    <div class="mb-3">
                         <button type="submit" name="" class="btn btn-primary ml-auto d-block">Create User</button>
                    </div>

               </div>

          </form>
          </section>
</main>
    
