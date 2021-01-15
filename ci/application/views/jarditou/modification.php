
            
            <div class="col-12 d-flex justify-content-center">
                <img src="<?php echo base_url("assets/images/".$produit->pro_id);?>" class="w-50" alt="Image responsive" title="<?=$produit->pro_id.".".$produit->pro_photo;?>" >
            </div>

            

            <?php echo form_open(); ?>
                <div class="form-group">
                    <label for="pro_id"><b>Identifiant Produit</b></label><input type="text" class="form-control" name="pro_id" id="pro_id" value="<?php echo $produit->pro_id?>" Readonly>
                    <label for="pro_ref"><b>Référence :</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_ref?>">
                    <?php echo form_error('pro_ref'); // affiche l'erreur du champs concerné?>
                    <label for="cat_nom"><b>Catégorie :</b></label>
                        <select class="form-control" name="pro_cat_id" id="pro_cat_id" >
             <?php
            
            foreach ($liste_categorie as $row){
                          
                    
                            echo"<option value=".$row->cat_id."";
                
                    // row1 : requête sur le produit                   
                    // row2 : requête sur la catégorie
                                    
                            if ($row->cat_id == $produit->pro_cat_id) {echo "selected";}
                    
                            echo">".$row->cat_nom."</option>\n"; //separation ligne SUR CODE SOURCE
                        
                    }
            ?>
                        </select>
                    
                    <label for="pro_libelle"><b>Libéllé produit :</b></label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo set_value('pro_libelle', $produit->pro_libelle); ?>">
                    <label for="pro_description"><b>Description produit :</b></label><input type="text" class="form-control" name="pro_description" id="pro_description"value="<?php echo set_value('pro_description', $produit->pro_description); ?>">
                    <label for="pro_prix"><b>Prix :</b></label><input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo set_value('pro_prix', $produit->pro_prix); ?>">
                    <?php echo form_error('pro_prix'); // affiche l'erreur du champs concerné?>
                    <label for="pro_stock"><b>Quantité en stock :</b></label><input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo set_value('pro_stock', $produit->pro_stock); ?>">
                    <?php echo form_error('pro_stock'); // affiche l'erreur du champs concerné?>
                    <label for="pro_couleur"><b>Couleur Produit :</b></label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo set_value('pro_couleur', $produit->pro_couleur); ?>">
                    
                    <label for="pro_photo"><b>Extension de la photo :</b></label><input type="text" class="form-control" name="pro_photo" id="pro_photo" value="<?php echo set_value('pro_photo', $produit->pro_photo); ?>" Readonly>
                    <br>
                    <label for="pro_bloque"><b>Produit bloqué :</b></label>
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Oui&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1" value=1 <?php if ($produit->pro_bloque == 1) echo"checked"; ?>>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Non&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2" value=0  <?php if ($produit->pro_bloque == 0) echo"checked"; ?>>
                        </div>
                    <br>

                    <label for="pro_d_ajout"><b>Date d'ajout :</b></label><input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" value="<?php echo set_value('pro_d_ajout', $produit->pro_d_ajout); ?>" Readonly>
                    <label for="pro_d_modif"><b>Date de modification :</b></label><input type="text" class="form-control" name="pro_d_modif" id="pro_d_modif" value='<?php date_default_timezone_set("Europe/Paris"); echo date("Y-m-d h:i:s"); ?>' Readonly>
                    
                   
                </div>  
            <div class="d-flex justify-content-center" name ="actionProduit">
                <button class="btn-primary ml-1" type="submit" >Enregistrer</button>
                <a class="btn-primary ml-2"   href="<?= base_url("index.php/jarditou/detailadmin/".$produit->pro_id);?>">Annuler</a>
            </div>

            </form>

            <br>


       
