<div class="page page-center">
    <div class="container-tight py-4">
        <div class=" mb-2">
            <h3>Thématiques éducatives</h3>
        </div>
        <p class=" mb-4">Sélectionnez, dans la liste ci-dessous construite avec les acteurs
            du territoire les acteurs du territoire, les Thématiques (3 max.) que vous êtes amenés à travailler principalement :</p>
        <form class="card card-md" action="<?= base_url("/updateThematique"); ?>" method="POST">
            <?php if (session()->has("error_nb_thematique")) { ?>
                <span class="text-danger text-center"><?= session("error_nb_thematique") ?></span>
            <?php } ?>
            <?php if (session()->has("error_thematique")) { ?>
                <span class="text-danger text-center"><?= session("error_thematique") ?></span>
            <?php } ?>
            <div class="mb-3">
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_thematiques as $cs_thematique) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_thematique[]" value="<?= $cs_thematique['id'] ?>" class="form-selectgroup-input" <?= $cs_thematique['active'] == 1 ? 'checked' : '' ?>>
                            <span class="form-selectgroup-label"><?php echo $cs_thematique['nom']; ?></span>
                        </label>
                    <?php } ?>
                </div>
            </div>


            <div class="mt-4">
                <button class="btn py-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                    Enregistrer
                </button>

            </div>
        </form>


    </div>
</div>