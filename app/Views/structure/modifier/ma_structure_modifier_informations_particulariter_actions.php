<div id="row justify-content-center">
    <div class="container-tight py-4">
        <div class=" mb-2">
            <h3>Particularité des actions</h3>
        </div>
        <p class="mb-4" style="font-weight:600">
            Vos actions ou certaines d'entre-elles sont concernées par l'une des modalités listées 
            ci-dessous, sélectionnez celles qui vous concernent: 
        </p>
        <form class="card card-md" action="<?= base_url("/updateParticulariteAction"); ?>" method="POST">
            <?php if (session()->has("error_particularite")) { ?>
                <span class="text-danger text-center"><?= session("error_particularite") ?></span>
            <?php } ?>
            
            <div class="mb-3">
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_particularite_actions as $cs_particularite_action) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_particularite_action[]" value="<?= $cs_particularite_action['id'] ?>" class="form-selectgroup-input" <?= $cs_particularite_action['active'] == 1 ? 'checked' : '' ?>>
                            <span class="form-selectgroup-label"><?php echo $cs_particularite_action['nom']; ?></span>
                        </label>
                    <?php } ?>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="mb-2">
                    <button type="submit" class="btn" style="background-color: #00819c; display: block; width: 100% ; color: white;">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>