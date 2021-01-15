
    <br>
    <a class="d-flex justify-content-center btn-secondary" href="<?= base_url("index.php/jarditou/ajouter")?>">Créer un nouvel enregistrement</a>
     
    <p id="tableau"></p>
    <div class="table-responsive"> <!--tableau responsive-->
      <table class="table table-hover table-bordered w-100 w-sm-50"> <!--tableau avec separation des ligne et contour-->
          <thead>
            <tr class="table-active">
              <th>Photo</th>
              <th>ID</th>
              <th>Référence</th>
              <th>Libellé</th>
              <th>Prix</th>
              <th>stock</th>
              <th>Couleur</th>
              <th>Ajout</th>
              <th>Modif</th>
              <th>bloqué</th>
            </tr>   
          </thead>
          <tbody>

          <?php 

/*<td class="d-flex justify-content-center table-warning"><img src="jarditou_photos/<?=$row->pro_id.".".$row->pro_photo;?>" alt="<?=$row->pro_id.".".$row->pro_photo;?>" width="100"></td>*/
foreach ($liste_produits as $row){
                    
                echo'<tr>';?>
                    <td class="table-warning"><img src="<?php echo base_url("assets/images/".$row->pro_id);?>" alt="<?=$row->pro_id.".".$row->pro_photo;?>" width="100">.</td>
                    
            <?php
                    echo"<th>".$row->pro_id."</th>";
                    echo"<th class='table-warning'>".$row->pro_ref."</th>";?>
                    <th><a href="<?= base_url("index.php/jarditou/detailadmin/".$row->pro_id);?>" title="<?=$row->pro_libelle;?>"><?=$row->pro_libelle;?></a></th>
                    <?php echo"<th class='table-warning'>".$row->pro_prix."</th>";
                    
                    if ($row->pro_stock == 0)  {echo"<th>"."Rupture de stock"."</th>";} else {echo"<th>".$row->pro_stock."</th>";}
                    
                    echo"<th class='table-warning'>".$row->pro_couleur."</th>";
                    echo"<th>".$row->pro_d_ajout."</th>";
                    echo"<th class='table-warning'>".$row->pro_d_modif."</th>";
                    
                    if ($row->pro_bloque == 1){   ?>
                        <th>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalScrollable">Bloqué</button>
                            <div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenteredLabel">Produit Bloqué</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">Nous vous tiendront informé sur les futurs disponibilités du produit</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
             <?php  }
                echo"</tr>";
            }

          ?>
         
          </tbody>        
      </table>
    </div>


    
  

