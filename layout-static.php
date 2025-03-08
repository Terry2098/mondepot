
<?php
include ("../layaout/navbar.php");
                ?>
        <div id="layoutSidenav">
        <?php
                include("../layaout/siderbar.php");
                ?>

            <div id="layoutSidenav_content">
                <main>
                    <table class=" table frm-table marge mt-5 table-hover " border 1>
                        <h1 style=" font-weight:  bold; text-decoration: underline; text-align: center;">LIST DES ENREGISTREMENTS DES CLIENTS</h1>
                        <thead class="bg-primary">
                           <tr>
                               <th>nom</th>
                               <th>prenom</th>
                               <th>email</th>
                               <th>tel </th>
                               <th>photo</th>
                               <th>action</th>
                               
                           </tr>
                        </thead>
                         <tbody>
                           <tr>
                               <td>chida</td>
                               <td>robin</td>
                               <td>chidarobin@gmail.com</td>
                               <td>670055895</td>
                               <td>//</td>
                                <td>
                                  <button class=" btn btn-danger fa fa-trash"></button>
                                  <button class=" btn btn-info fa fa-eye"></button>
                                  <button class=" btn btn-success fa fa-book"></button>
                               </td>
                           </tr>
                         </tbody>
                       </table>
                
                </main>
                <?php
                include("../layaout/footer.php");
                ?>
               