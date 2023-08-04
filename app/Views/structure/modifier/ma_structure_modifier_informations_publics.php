<div id="row justify-content-center">
    <div class="container py-2">
        <div class=" mb-2">
            <h3>Publics</h3>
        </div>
        <p class=" mb-4 fw-bolder">L'item "Tous" permet de sélectionner toutes
            les publics simultanément:</p>

        <form class="card card-md " action="<?= base_url("/updatePublic"); ?>" method="POST">
            <?php if (session()->has("error_public")) { ?>
                <span class="text-danger text-center"><?= session("error_public") ?></span>
            <?php } ?>
            <div class="mb-3">
                <div class="form-selectgroup form-selectgroup-pills">
                    <?php foreach ($cs_publics as $cs_public) { ?>
                        <label class="form-selectgroup-item">
                            <input type="checkbox" name="id_public[]" value="<?= $cs_public['id'] ?>" class="form-selectgroup-input" <?= $cs_public['active'] == 1 ? 'checked' : '' ?>>
                            <span class="form-selectgroup-label"><?php echo $cs_public['nom']; ?></span>
                        </label>
                    <?php } ?>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="tous" value="Tous" id="check-all" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Tous</span>
                    </label>
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
<script>
    const checkAll = document.getElementById('check-all');
    const checkboxes = document.querySelectorAll('.form-selectgroup-input');

    checkAll.addEventListener('click', function() {
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = checkAll.checked;
        });
    });
</script>

</div>