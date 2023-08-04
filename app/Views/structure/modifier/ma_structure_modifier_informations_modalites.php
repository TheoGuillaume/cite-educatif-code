<div id="row justify-content-center">
   <div class="container-tight py-4">
      <div class="mb-3 ">
         <h3>Modalit&eacute; d'accueil des publics</h3>
      </div>
      <h3 class=" mb-4">Précisez si vous avez des conditions d’accueil des publics spécifiques.</h3>
      <form class="card card-md" action="<?= base_url("/updateModaliteInformations"); ?>" method="POST">
         <?php if (session()->has("error_modalite")) { ?>
            <span class="text-danger text-center"><?= session("error_modalite") ?></span>
         <?php } ?>
         <div class="pb-3 pt-2">
            <div class="form-selectgroup form-selectgroup-pills">
               <?php foreach ($cs_modalites as $cs_modalite) { ?>
                  <label class="form-selectgroup-item">
                     <input type="checkbox" name="id_modalite[]" value="<?= $cs_modalite['id'] ?>" class="form-selectgroup-input" <?= $cs_modalite['active'] == 1 ? 'checked' : '' ?>>
                     <span class="form-selectgroup-label"><?php echo $cs_modalite['nom']; ?></span>
                  </label>
               <?php } ?>
            </div>
         </div>

         <br>
         
            <div style="margin-top:6rem">
               <button type="submit" class="btn  p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                  Enregistrer
               </button>

          
         </div>
      </form>



   </div>
</div>