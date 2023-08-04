<div class="container">
    <h3>Nom et prénom</h3>
    <span class="text-muted">Renseignez vos coordonnées réelles pour permettre aux
        administrateurs de vous reconnaître facilement</span>
</div>
<div class="container mt-2">

    <form action="<?= base_url("/updateNameActeur"); ?>" method="POST">

        <div class="form-outline mb-4">
            <div class="my-2">
                <label>Nom</label>
                <input type="text" name="nom" value="<?= $acteurs["nom"] ?>" class="form-control" placeholder="Nom actuel">

            </div>
            <div class="my-2">
                <label>Prénom</label>
                <input type="text" name="prenom" value="<?= $acteurs["prenom"] ?>" class="form-control" placeholder="Prénom actuel">

            </div>

        </div>
        <br>
        <div style="position: fixed;
            left: 0;
            bottom: 0;
            width: 90%;
            color: white;
            text-align: center;">
            <button type="submit" class="btn m-3 p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                Enregistrer les modifications
            </button>
        </div>
</div>
</form>