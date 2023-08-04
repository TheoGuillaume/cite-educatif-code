<style>
    body {
        overflow-y: hidden !important;
    }
</style>
<div class="container-tight py-2">
    <div class="text-center mb-4">
        <h1>Particularit&eacute;s de vos actions</h1>
    </div>
    <p class="text-center mb-3">Vos actions ou certaines d'entre-elles sont concern&eacute;es par l'une des
        modalit&eacute;s list&eacute;es ci-dessous, sélectionnez celles qui vous concernent (3 max) :</p>
    <form class="card card-md" id="myForm"
        action="<?= base_url("/inscription/structure/inscriptionStructureParticulariteActionSave"); ?>" method="POST">
        <?php if (session()->has("error_nb_action")) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg> &nbsp;&nbsp;
                <div>
                    <?= session("error_nb_action") ?>
                </div>
            </div>
        <?php } ?>
        <?php if (session()->has("error_particularite")) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg> &nbsp;&nbsp;
                <div>
                    <?= session("error_particularite") ?>
                </div>
            </div>
        <?php } ?>
        <div class="pb-3 pt-2">
            <div class="form-selectgroup form-selectgroup-pills">
                <?php foreach ($cs_particularite_actions as $cs_particularite_action) { ?>
                    <label class="form-selectgroup-item">
                        <input type="checkbox" id="<?= $cs_particularite_action['id'] ?>" name="id_particularite_action[]"
                            value="<?= $cs_particularite_action['id'] ?>" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">
                            <?php echo $cs_particularite_action['nom']; ?>
                        </span>
                    </label>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Listez quelques exemples d'actions <span class="text-danger">*</span></label>
            <textarea class="form-control" maxlength="200" id="exemples_action" name="exemples_action"
                data-bs-toggle="autosize" placeholder="450 caract&egrave;res max."></textarea>
        </div>

        <div class="row align-items-center mt-3">
            <div class="col-auto">
                <a href="<?= base_url("inscription/structure/inscriptionStructurePublic") ?>"
                    class="text-secondary text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-left mt-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg> Retour en arrière</a>
            </div>
            <div class="col">
                <div class="btn-list justify-content-end">
                    <button type="submit" class="btn" style="background-color:#009CBB; color: white" ;>Suivant
                        <svg viewBox="0 0 1024 1024" height="14" class="icon mx-1" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#FFFF">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M364.8 106.666667L298.666667 172.8 637.866667 512 298.666667 851.2l66.133333 66.133333L768 512z"
                                    fill="#FFFF"></path>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<script>
    function handleCheckboxChange() {
        var checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
        var maxAllowed = 3;

        if (checkboxes.length > maxAllowed) {
            this.checked = false;
        }
    }

    // Add event listeners to checkboxes
    var checkboxes = document.querySelectorAll("input[type=checkbox]");
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", handleCheckboxChange);
    });


    if (typeof (Storage) !== "undefined") {
        // Get the saved checkbox values from local storage
        var savedCheckboxes = localStorage.getItem("particularite_action");
        var exemples_action = document.getElementById("exemples_action");
        var store_exemples_action = localStorage.getItem("exemples_action");

        exemples_action.value = store_exemples_action;
        if (savedCheckboxes !== null) {
            savedCheckboxes = JSON.parse(savedCheckboxes);
            //alert(savedCheckboxes);
            // Set the checkboxes' checked state based on the saved values
            for (var i = 0; i < savedCheckboxes.length; i++) {
                var checkbox = document.getElementById(savedCheckboxes[i]);
                //alert(checkbox);
                if (checkbox !== null) {
                    checkbox.checked = true;
                }
            }
        }
    }

    // Save the checkbox values to local storage when the form is submitted
    document.getElementById("myForm").addEventListener("submit", function () {
        var checkedCheckboxes = [];
        var checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
        var exemples_action = document.getElementById("exemples_action").value;
        //alert(checkboxes.length);
        for (var i = 0; i < checkboxes.length; i++) {
            checkedCheckboxes.push(checkboxes[i].id);

        }
        //alert(checkedCheckboxes);
        localStorage.setItem("particularite_action", JSON.stringify(checkedCheckboxes));
        localStorage.setItem("exemples_action", exemples_action);
    });
</script>