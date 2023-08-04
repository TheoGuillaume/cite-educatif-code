<br>
<div class="container">
    <h3>Nom de ma stucture</h3>
</div>
<div class="container">
    <div class=" mb-4">
        <p>Si votre structure n'est pas référencée,
            veuillez entrer manuellement le nom. Nous vous conseillons d'en informer vos
            responsables afin </p>
    </div>
    <form action="<?= base_url("/updateNomStruct"); ?>" method="POST">
        <label>Structure à laquelle vous appartenez</label>
        <select class="form-control" name="id_structure">
              <?php foreach ($structs as $struct) { ?>
                <option value="<?= $struct['id']  ?>"><?= $struct['id_utilisateur']  ?> <?= $struct['nom_social']  ?> <?= $struct['adresse_siege']  ?></option>
              <?php } ?>
            </select>
        <div class="container">
            <div class="text-center">
                <button type="button" class="btn btn-light">+ Ajouter une structure </button>
            </div>
        </div>
        <div style="position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 90%;
                    color: white;
                    text-align: center;">
            <button type="submit" class="btn m-3 p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                Enregistrer
            </button>

        </div>

    </form>

</div>