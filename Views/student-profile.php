
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Student Profile</h2>
               <table class="table bg-light-alpha" border="1"> 
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
                   
                 
                     
                 
                         foreach ($studentList as $student) {
                          
                              if ($student->getEmail() == $_SESSION["email"]) {
                                  
                                
                         ?>
                              <tr>

                                   <td><?php echo $student->getStudentId().'<br>';?></td>
                                   <td><?php echo $student->getCareerId() . '<br>'; ?></td>
                                   <td><?php  echo $student->getFirstName() . '<br>';?></td>
                                   <td><?php echo $student->getLastName() . '<br>';  ?></td>
                                   <td> <?php echo $student->getDni(). '<br>';  ?></td>
                                   <td><?php echo $student->getFileNumber() . '<br>';  ?></td>
                                   <td><?php  echo $student->getGender() . '<br>'; ?></td>
                                   <td><?php echo $student->getBirthDate() . '<br>';  ?></td>
                                   <td><?php   echo $student->getEmail(). '<br>'; ?></td>
                                   <td><?php  echo $student->getPhoneNumber() . '<br>';  ?></td>
  
                              </tr>
                         <?php
                         }   
                    }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
     
</main>