<div class="page">
    <div class="container-tight py-4">
        <div class=" mb-2">
            <h3>Champs d'action</h3>
        </div>
        <p class=" mb-4">Sélectionnez, dans la liste ci-dessous construite avec les acteurs
            du territoire lors de groupes de travail, les champs (3max.) qui représentent
            le plus vos missions :</p>

        <form class="card card-md" action="<?= base_url("/updateChampAction"); ?>" method="POST">
            <?php if (session()->has("error_action")) { ?>
                <span class="text-danger text-center"><?= session("error_action") ?></span>
            <?php } ?>
            <?php if (session()->has("error_nb_action")) { ?>
                <span class="text-danger text-center"><?= session("error_nb_action") ?></span>
            <?php } ?>
            <div class="mb-3">
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php
                    foreach ($listes as $liste) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_champ_action[]" value="<?= $liste['id'] ?>" class="form-selectgroup-input" <?= $liste['active'] == 1 ? 'checked' : '' ?>>
                            <span class="form-selectgroup-label"><?php echo $liste['nom'];  ?></span>
                        </label>
                    <?php } ?>
                </div>
            </div>

          
                <div class="mt-4">
                    <button type="submit" class="btn  py-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                        Enregistrer
                    </button>

                </div>
        
        </form>

    </div>
</div>