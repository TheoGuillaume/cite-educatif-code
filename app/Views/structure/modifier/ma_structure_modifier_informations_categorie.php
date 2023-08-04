
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="mb-2">
            <h3>Catégorie</h3>
        </div>
        <p class=" mb-4">Sélectionnez parmi les items ci-dessous la catégorie se rapprochant le plus de votre offre de service :</p>
        <form class="card card-md" action="<?= base_url("/updateCategorie"); ?>" method="POST">
            <?php if (session()->has("error_categorie")) { ?>
                <span class="text-danger text-center"><?= session("error_categorie") ?></span>
            <?php } ?>
            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                <?php foreach ($cs_categories as $cs_categorie) { ?>
                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="id_categorie" value="<?= $cs_categorie['id'] ?>" class="form-selectgroup-input" <?= $cs_categorie['id'] == $id_categories['id_categorie'] ? "checked" : "" ?>>
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                            <div class="form-selectgroup-label-content d-flex align-items-center">
                                <div>
                                    <div style="font-weight:900"><?php echo $cs_categorie['nom']; ?></div>
                                    <div style="font-weight:400"><?php echo $cs_categorie['desc_cat']; ?></div>
                                </div>
                            </div>
                        </div>
                    </label>
                <?php } ?>
            </div>
            <div class="mt-4">
               
                    <button type="submit" class="btn py-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                        Enregistrer
                    </button>

                    </div>
          
        </form>

    </div>
</div>