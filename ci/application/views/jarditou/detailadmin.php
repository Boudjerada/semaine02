
       
            
            <div class="col-12 d-flex justify-content-center">
                <img src="<?php echo base_url("assets/images/".$produit->pro_id);?>" class="w-50" alt="Image responsive" title="<?=$produit->pro_id.".".$produit->pro_photo;?>" >
            </div>

            

            <form name="Détail produit" id="Détail produit">
                <div class="form-group">
                    <label for="pro_id"><b>Identifiant :</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_id?>" Readonly>
                    <label for="pro_ref"><b>Référence :</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_ref?>" Readonly>
                    <label for="nomProduit"><b>Catégorie :</b></label><input type="text" class="form-control" name="nomProduit" id="nomProduit" value="<?php echo $produit->cat_nom?>" Readonly>
                    <label for="pro_libelle"><b>Libéllé produit :</b></label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo $produit->pro_libelle ?>" Readonly>
                    <label for="pro_description"><b>Description produit :</b></label><input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo $produit->pro_description?>" Readonly>
                    <label for="pro_prix"><b>Prix :</b></label><input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo $produit->pro_prix ?>" Readonly>
                    <label for="pro_stock"><b>Quantité en stock :</b></label><input type="number" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo $produit->pro_stock ?>" Readonly>
                    <label for="pro_couleur"><b>Couleur Produit :</b></label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo $produit->pro_couleur ?>" Readonly>
                    <br>
                    <label for="pro_bloque"><b>Produit bloqué :</b></label>
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Oui&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1"  <?php if ($produit->pro_bloque == 1) echo"checked"; ?> disabled>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Non&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2"   <?php if ($produit->pro_bloque == 0) echo"checked"; ?> disabled>
                        </div>
                    <br>
                    <label for="pro_d_ajout"><b>Date d'ajout :</b></label><input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" value="<?php echo $produit->pro_d_ajout?>" Readonly>
                    <label for="pro_d_modif"><b>Date de modification :</b></label><input type="text" class="form-control" name="pro_d_modif" id="pro_d_modif" value="<?php echo $produit->pro_d_modif?>" Readonly>
                    
                   
                </div>  

            </form>

            <div class="d-flex justify-content-center" name = actionProduit>
                <a class="btn-primary ml-2"  href="<?php echo base_url("index.php/jarditou/supprimer/".$produit->pro_id);?>">Supprimer</a>
              
                <a class="btn-primary ml-2"  href="<?php echo base_url("index.php/jarditou/modifier/".$produit->pro_id);?>">Modifier</a>
                
                <a class="btn-primary ml-2"  href="<?php echo base_url("index.php/jarditou/liste");?>">Retour</a>
            </div>
            <br>
