<div id="row justify-content-center">
   <br>

   <div class="container mb-2">
      <h3>Nom de ma structure</h3>
      <p style="font-weight:500">Attention! Vous ne pouvez modifier le nom de votre strucure qu'une (1) fois tous les 12 mois.</p>
   </div>
   
     
      <form class="container" action="<?= base_url("/updateNomstructure"); ?>" method="post">

         <input type="text" value="<?= $structs["nom_social"] ?>" name="nom_social" class="form-control text-muted" placeholder="Nom actuel" required>
         <div style="display:flex;   justify-content: center!important;">
            <button type="submit" class="btn py-2   my-4" style=" position: fixed;
                bottom: 0;
                width:90%;
                color: white;
                text-align: center; color: white; background-color:#2895ab ;">
               Enregistrer
            </button>
         </div>

      </form>




</div>