<div class="container-tight py-4">
    <h3>Poste</h3>


    <div class="form-outline mb-2 ">
        <p class="text-muted">Renseignez le poste que vous occupez au sein de votre structure</p>
        <form  action="<?= base_url("/updatePoste"); ?>" method="POST">
            <label class="mt-3">Poste</label>
            <input type="text" name="poste" value="<?= $acteurs["poste"] ?>" class="form-control" placeholder="Poste actuel">
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
        </form>
    </div>

</div>