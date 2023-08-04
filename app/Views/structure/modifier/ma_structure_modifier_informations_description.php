<div id="row justify-content-center">
    <div class="container py-2">
        <div class="mb-2">
            <h3>Description</h3>
        </div>
        <form action="<?= base_url('/updateDescStrcucture'); ?>" method="post">

            <label class="form-label" for="form2Example1">Décrivez votre structure en quelques mots</label>
            <textarea class="form-control" name="desc_mission" id="exampleFormControlTextarea1" rows="5" placeholder="450 caractères max" required>
            <?php echo $structs["desc_mission"] ?>
            </textarea>

            <?php if (session()->has("erreur_desc")) { ?>
                <span class="text-danger text-center"><?= session("erreur_desc") ?></span>
            <?php } ?>

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