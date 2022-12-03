
<main class="py-5">
     <section id="listado" class="mb-5">
   <!--  <form action=<?php echo FRONT_ROOT ?>Student\subirCv method="post" enctype="multipart/form-data">
               <div class="container">
                    <h3 class="mb-3">Agregar CV</h3>
                    <div>
                         <label for="file">Subir CV</label>
                         </br>
                         <input type="file" name="fichero">
                         <button type="submit" name="submit" class="btn btn-primary ml-auto d-block">Agregar</button>
                    </div>
                    <div class="mb-3">
               </div>
          </form>-->
        
          <form action="<?php echo FRONT_ROOT ?>Student\subirCv" method="post" enctype="multipart/form-data">  
    Seleccione archivo: <input name="fichero" type="file" size="150" maxlength="150">  
    <br><br> Nombre: <input name="nombre" type="text" size="70" maxlength="70"> 
    <br><br> Descripcion: <input name="description" type="text" size="100" maxlength="250"> 
    <br><br> 
  <input name="submit" type="submit" value="SUBIR ARCHIVO">   
</form> 
     </section>
</main>

