


        <h1 class="d-flex-justify-content-center"><b>Ajout d'un produit</b></h1>  
        <?php echo form_open(); ?>
        <label for="cat_id"><b>Nom catégorie<b></label>
        <select class="form-control" name="pro_cat_id" id="pro_cat_id" >
            <?php
            
            foreach ($liste_categorie as $row){
                        echo"<option value=".$row->cat_id.""; echo">".$row->cat_nom."</option>\n"; //separation ligne SUR CODE SOURCE
                    }
            ?>
        </select>
        <div class="form-group">
            <label for="pro_ref"><b>Réference produit</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo set_value('pro_ref'); ?>">
            <?php echo form_error('pro_ref'); // affiche l'erreur du champs concerné?>
            <label for="pro_libelle"><b>Libéllé produit</b></label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo set_value('pro_libelle'); ?>">
            <label for="pro_description"><b>Description produit</b></label><input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo set_value('pro_description'); ?>">
            <label for="pro_prix"><b>Prix</b></label><input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo set_value('pro_prix'); ?>">
            <?php echo form_error('pro_prix'); // affiche l'erreur du champs concerné?>
            <label for="pro_stock"><b>Quantité en stock</b></label><input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo set_value('pro_stock'); ?>">
            <?php echo form_error('pro_stock'); // affiche l'erreur du champs concerné?>
            <label for="pro_couleur"><b>Couleur Produit</b></label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo set_value('pro_couleur'); ?>">
            <label for="pro_photo"><b>Extension de la photo :</b></label>
                                <select class="form-control" name="pro_photo" id="pro_photo">
                                     <option>jpg</option>
                                     <option>png</option>
                                     <option>gif</option>
                                </select>
        </div>      
        <b>Produit bloqué&nbsp&nbsp<b>
        <div class="form-check form-check-inline">
             <label class="form-check-label" for="pro_bloque"><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1" value=1>bloque</label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="pro_bloque"><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2" value=0>Non bloque</label>
        </div>
        <br>
        <br>
        <label for="pro_d_ajout"><b>Date d'ajout :</b></label><input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" value='<?php date_default_timezone_set("Europe/Paris"); echo date("Y-m-d h:i:s"); ?>' Readonly>
        <br>
        <br>
        <div class="d-flex justify-content-center" name ="actionProduit">
                <button class="btn-primary ml-1" type="submit" >Enregistrer</button>
                <a class="btn-primary ml-2"   href="<?= base_url("index.php/jarditou/liste");?>">Annuler</a>
            </div>
    </form>

    <br>


 

