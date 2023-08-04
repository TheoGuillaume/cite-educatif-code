<div id="row justify-content-center">
    <div class="container py-2">
        <div class="container" style="margin-top: 10px;">
            <label class="form-label required">Horaire d'ouverture</label>
            <small style="font-weight:600">Jour et horaire d'ouverture de votre accueil physique</small>
        </div>
        <form class="container" style="margin-top: 10px;" action="<?= base_url('/updateJourHorraire'); ?>" method="post">
            <div class="mb-3">
                <div class="form-selectgroup" style="margin-top: 1rem;">
                    <label class="form-check">
                        <input class="form-check-input" id="semaine" type="checkbox" name="semaine" value="1" <?= !empty($semaines) ? 'checked' : '' ?>>
                        <span class="form-check-label">SEMAINE</span>
                    </label>
                </div>
                <div class="form-selectgroup form-selectgroup-pills">
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="matin_semaine" value="matin" class="form-selectgroup-input semaine" <?= $semaines['matin'] == 'matin' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Matin</span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="midi_semaine" value="midi" class="form-selectgroup-input semaine" <?= $semaines['midi'] == 'midi' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Apr&egrave;s-midi</span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="soir_semaine" value="soir" class="form-selectgroup-input semaine" <?= $semaines['soir'] == 'soir' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Soir</span>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-selectgroup">
                    <label class="form-check">
                        <input class="form-check-input" id="weekend" type="checkbox" name="weekend" value="2" <?= !empty($weekends) ? 'checked' : '' ?>>
                        <span class="form-check-label">WEEKEND</span>
                    </label>
                </div>
                <div class="form-selectgroup form-selectgroup-pills">
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="matin_weekend" value="matin" class="form-selectgroup-input weekend" <?= $weekends['matin'] == 'matin' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Matin</span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="midi_weekend" value="midi" class="form-selectgroup-input weekend" <?= $weekends['midi'] == 'midi' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Apr&egrave;s-midi</span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="soir_weekend" value="soir" class="form-selectgroup-input weekend" <?= $weekends['soir'] == 'soir' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Soir</span>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-selectgroup">
                    <label class="form-check">
                        <input class="form-check-input" id="vacance" type="checkbox" name="vacance" value="3" <?= !empty($vacances) ? 'checked' : '' ?>>
                        <span class="form-check-label">VACANCES <br>SCOLAIRES</span>
                    </label>
                </div>
                <div class="form-selectgroup form-selectgroup-pills">
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="matin_vacance" value="matin" class="form-selectgroup-input vacance" <?= $vacances['matin'] == 'matin' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Matin</span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="midi_vacance" value="midi" class="form-selectgroup-input vacance" <?= $vacances['midi'] == 'midi' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Apr&egrave;s-midi</span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" name="soir_vacance" value="soir" class="form-selectgroup-input vacance" <?= $vacances['soir'] == 'soir' ? 'checked' : '' ?> disabled>
                        <span class="form-selectgroup-label">Soir</span>
                    </label>
                </div>
            </div>
            <?php if (session()->has("error_message")) { ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg> &nbsp;&nbsp;
                    <div>
                        <?= session("error_message") ?>
                    </div>
                </div>
            <?php } ?>

            
                <div style="margin-top:17rem;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;">
                    <button type="submit" class="btn  p-2 d-block w-100" style="  color: white; background-color:#2895ab ;">
                        Enregistrer
                    </button>

                </div>
         
        </form>
    </div>
</div>
<script>
    var semaineCheck = document.getElementById('semaine');
    var checkboxeSemaine = document.querySelectorAll('.semaine');

    var weekendCheck = document.getElementById('weekend');
    var checkboxeWeekend = document.querySelectorAll('.weekend');

    var vacanceCheck = document.getElementById('vacance');
    var checkboxeVacance = document.querySelectorAll('.vacance');

    if (semaineCheck.checked == true) {
        checkboxeSemaine.forEach(function(checkbox) {
            checkbox.disabled = false;
        });
    }

    if (weekendCheck.checked == true) {
        checkboxeWeekend.forEach(function(checkbox) {
            checkbox.disabled = false;
        });
    }

    if (vacanceCheck.checked == true) {
        checkboxeVacance.forEach(function(checkbox) {
            checkbox.disabled = false;
        });
    }

    //Semaine addEventListener
    semaineCheck.addEventListener('change', function() {
        if (this.checked) {
            checkboxeSemaine.forEach(function(checkbox) {
                checkbox.disabled = false;
            });
        } else {
            checkboxeSemaine.forEach(function(checkbox) {
                checkbox.disabled = true;
                checkbox.checked = false;
            });
        }
    });

    //Weekend
    weekendCheck.addEventListener('change', function() {
        if (this.checked) {
            checkboxeWeekend.forEach(function(checkbox) {
                checkbox.disabled = false;
            });
        } else {
            checkboxeWeekend.forEach(function(checkbox) {
                checkbox.disabled = true;
                checkbox.checked = false;
            });
        }
    });

    // //Vacance
    vacanceCheck.addEventListener('change', function() {
        if (this.checked) {
            checkboxeVacance.forEach(function(checkbox) {
                checkbox.disabled = false;
            });
        } else {
            checkboxeVacance.forEach(function(checkbox) {
                checkbox.disabled = true;
                checkbox.checked = false;
            });
        }
    });
</script>