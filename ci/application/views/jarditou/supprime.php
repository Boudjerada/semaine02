

            <div class="col-12 d-flex justify-content-center">
                <img src="<?php echo base_url("assets/images/".$produit->pro_id);?>" class="w-50" alt="Image responsive" title="<?=$produit->pro_id.".".$produit->pro_photo;?>" >
            </div>


            <h1 class="d-flex justify-content-center"><b><?=$produit->pro_libelle?></b></h1>
            <br>
            <h3 class="d-flex justify-content-center">Etes vous sûr de vouloir supprimer&nbsp<b><?=$produit->pro_libelle?></b>&nbspde la base de données ?<h3>

            <br>
            <br>
           
            <?php echo form_open(); ?>
        
                <input type="hidden" name="pro_id" value="<?php echo $produit->pro_id; ?>">
                <div class="d-flex justify-content-center" name = actionProduit>    
                    <button type="submit" class="btn btn-dark">Supprimer</button>   
                    <a class="btn-primary ml-2"  href="<?php echo base_url("index.php/jarditou/liste");?>">Annuler</a>
                </div>
              
            </form>

            <br>

          