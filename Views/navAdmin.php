
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>Menu Admin</strong>
     </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Company\ShowAddView >Add Company</a>
          </li>
          <br>
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Company\ShowListView >Company List</a>
          </li> 
          <br>
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Company\ShowSearchView>Modify Company</a>
          </li>  
           <br> 
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Company\ShowDeleteView>Delete Company</a>
          </li>   
          <br> 
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Student\Register>Add Student</a>
          </li>  
          <br> 
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Student\ShowListView>Student List</a>
          <br>
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>User\ShowUserAdminView >Add Admin</a>
          </li> 
          <br>
       
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Ofert\ShowADDofertchView >Add Job Offer</a>
          </li> 
          <br>
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Ofert\ShowListJobOferView >List Job Offer</a>
          </li> 
          <br>
          <li class="nav-item">
               <a class="nav-link" href=<?php echo FRONT_ROOT?>Student\showViewCV >ver CV </a>
          </li> 
         
     </ul>
     
     <a href=<?php echo FRONT_ROOT?>Session\logout >Cerrar Sesion</a>
</nav>