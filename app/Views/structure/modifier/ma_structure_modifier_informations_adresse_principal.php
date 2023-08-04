<div id="row justify-content-center">
    <br>

    <div class="container">
        <h3>Adresse principale</h3>
    </div>

    <div class="container">
        <p class="text-muted">Vous pouvez renseigner votre siège social ou l'adresse de vos principaux bureaux pour
            qu'on puisse vous retrouver facilement.
        </p>
    </div>

    <form class="container" action="<?= base_url("/upadteAdressePrincipal"); ?>" method="post">
        <div class="row">
            <div class=" mb-4 mt-2">
                <input oninput="fetchAddresses( 'adresse_principal' , 'adresse_principal_option' )" type="text" id="adresse_principal" value="<?= $structs['adresse_principale'] ?>" name="adresse_principale" class="form-control" placeholder="Votre adresse principale" required>
                <select class="form-control" id="adresse_principal_option" style="display:none;" onchange="updateInputValue( 'adresse_principal' , 'adresse_principal_option' )">
                    <option>Aucune</option>
                </select>
            </div>
        </div>
        <!-- <div class="row">
            <div class=" mb-4">
                <img src="<?= base_url("assets/img/capture_map.png"); ?>" style="width: 100%; border-radius: 15px;" alt="">
            </div>
        </div> -->
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
<script src="<?= base_url("assets/js/myJs.js"); ?>"></script>