<div id="row justify-content-center">
    <br>
    <div class="container">

        <h3>Modifier site web</h3>



        <form action="<?= base_url("/updateSiteWeb") ?>" method="post">
            <div class="row">
                <label for="basic-url" class="form-label">Votre adresse site web</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">https://</span>
                    <input type="text" name="site_web" value="<?= $structs["site_web"] ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>

            </div>
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
</div>